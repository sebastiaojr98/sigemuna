<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\FormPayment;
use App\Models\InternalRevenue;
use App\Models\TypeRevenue;
use Exception;
use Livewire\Component;

use phputil\extenso\Extenso;

class FormularioReceitaInterna extends Component
{
    public $process_code, $type_revenue, $form_payment, $revenue_date, $amount, $client, $description;
    
    
    public function render()
    {
        $form_payments = FormPayment::get();
        $type_revenues = TypeRevenue::get();
        $clients = Client::get();

        return view('livewire.revenue.formulario-receita-interna')->with(["form_payments" => $form_payments, "type_revenues" => $type_revenues, "clients" => $clients]);
    }


    public function createRevenue(){

        $this->validate([
            'process_code' => 'required',
            'form_payment' => 'required',
            'amount' => 'required|numeric|min:0',
            'revenue_date' => 'required|date',
            'type_revenue' => 'required',
            'description' => "required",
            'client' => 'required',
        ]);


        try {
            $revenue = InternalRevenue::create([
                'reference' => 'IR-'. date('ym'). "-" .$this->reference(),
                "process_number" => $this->process_code,
                "form_payment_id" => $this->form_payment,
                "type_revenue_id" => $this->type_revenue,
                "client_id" => $this->client,
                'revenue_date' => $this->revenue_date,
                "amount" => $this->amount,
                "description" => $this->description,
                "status" => '0',
                "user_create_id" => auth()->user()->id
            ]);
            $e = new Extenso();
            $e = $e->extenso($revenue->amount, Extenso::MOEDA);
            $e = str_replace(["real", "reais"], ["metical", "meticais"], $e);

            $this->clearAttr();
            return $this->dispatch("cadastrado", [
                "modal" => "#createRevenue", //id do modal
                "title" => "Receita Interna!",
                "icon" => "success",
                "text" => "Uma receita pertencente ao Sr(a) ".$revenue->client->full_name." no valor de: ".number_format($revenue->amount, 2, ".", " "). "MT ({$e}) relacionada a ". $revenue->typeRevenue->label. " foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //Gerador de Codigo
    private function reference(){
        return rand(10000, 99999);
    }

    private function clearAttr()
    {
        $this->process_code = "";
        $this->amount = "";
        $this->type_revenue = "";
        $this->form_payment = "";
        $this->revenue_date = "";
        $this->client = "";
        $this->description = "";
        $this->document = "";
    }
}
