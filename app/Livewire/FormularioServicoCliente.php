<?php

namespace App\Livewire;

use App\Support\SMS;
use App\Support\Strings;
use App\Models\Client;
use App\Models\FormPayment;
use App\Models\InternalRevenue;
use App\Models\Neighborhood;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\SubService;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioServicoCliente extends Component
{
    use WithFileUploads;

    public $amount = 0, $sub_services = [];

    public $client, $service, $form_payment, $sub_service, $neighborhood, $observation;

    public $showFormLA, $showFormLT;

    public  function mount($client)
    {
        $this->client = $client;
    }

    public function render()
    {
        $services = Service::get();
        $neighborhoods = Neighborhood::get();
        $form_payments = FormPayment::get();

        return view('livewire.client.formulario-servico-cliente')->with(["services" => $services, "neighborhoods" => $neighborhoods, "form_payments" => $form_payments]);
    }


    public function setSubServices()
    {
        $this->sub_services = [];
        $this->sub_service = "";
        $this->amount = 0;


        if ($this->service) {
            $this->sub_services = SubService::where("service_id", "=", $this->service)->get();
        }else{
            $this->sub_services = [];
            $this->amount = 0;
        }
    }

    public function setAmount()
    {
        if($this->sub_service){
            $sub_service = SubService::find($this->sub_service);
            $this->amount = $sub_service->amount;
            
        }else{
            $this->amount = 0;
        }
    }

    public function createActivity(Client $client)
    {
        
        $this->validate([
            'service' => 'required',
            "form_payment" => "required",
            'sub_service' => 'required',
            'neighborhood' => "required",
            'observation' => 'nullable',
        ]);

        //Iniciando a Transacao
        DB::beginTransaction();

        try {
            $service_order = ServiceOrder::create([
                'reference'  => 'SRC-'. date('ym'). "-" .$this->reference(),
                'status' => '0',
                'client_id' => $client->id,
                'user_id' => auth()->user()->id,
                'service_id' => $this->service,
                'neighborhood_id' => $this->neighborhood,
                'sub_service_id' => $this->sub_service,
                'observation' => $this->observation,
            ]);
            //Criando a transacao automaticamente
            InternalRevenue::create([
                'reference' => 'IR-'. date('ym'). "-" .$this->reference(),
                "process_number" => $service_order->reference,
                "form_payment_id" => $this->form_payment,
                "type_revenue_id" => 2,
                "revenue_date" => date("Y-m-d"),
                "description" => "Referente ao serviço {$service_order->service->name}",
                "client_id" => $client->id,
                "amount" => $this->amount,
                "status" => '0',
                "user_create_id" => auth()->user()->id
            ]);

            DB::commit();
            $this->clearService();
            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Prestação de Serviço!",
                "icon" => "success",
                "text" => "A actividade de ". $service_order->service->name. " foi solicitada com sucesso! Dirija-se ao sector financeiro para efetuar o pagamento."
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    //Gerador de Codigo
    private function reference(){
        return rand(10000, 99999);
    }


    private function clearService()
    {
        $service = "";
        $form_payment = "";
        $sub_service = "";
        $neighborhood = "";
        $observation = "";

    }
}
