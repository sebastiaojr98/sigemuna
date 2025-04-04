<?php

namespace App\Livewire\Customers;

use App\Models\AccountReceivable;
use App\Models\Invoice;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\ServiceContracted;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportEvents\Event;

class ContractedServiceForm extends Component
{
    public $customer;

    public string $serviceCategory = '';
    public string $service = '';

    public $services = [];

    public  function mount($customer)
    {
        $this->customer = $customer;

    }

    public function render()
    {
        $serviceCategories = ServiceCategory::all();

        return view('livewire.customers.contracted-service-form')->with(["serviceCategories" => $serviceCategories]);
    }

    public function searchService(): void
    {
        $this->services = Service::where("category_id", $this->serviceCategory)->get();
    }


    public function contractService(): Event
    {
        $this->validate([
            'serviceCategory' => 'required|exists:service_categories,id',
            'service' => 'required|exists:services,id'
        ]);

        DB::beginTransaction();

        try {

            //Registar contratacao de servico
            $sc = ServiceContracted::create([
                'customer_id' => $this->customer->id,
                'service_id' => $this->service,
            ]);

            //Gerar Uma Fatura
            //dd($sc->service->name);
            $str = str_contains(strtolower($sc->service->name), "licença");
            
            $invoice = Invoice::create([
                'customer_id' => $sc->customer_id,
                'number' => "FT-".date("Y/m")."/".mt_rand(10000, 99999),
                'type' => $str ? "Licença" : "Serviço",
                'total_amount' => $sc->service->base_price,
                'due_date' => now()->addDay(30),
            ]);

            $ar = AccountReceivable::create([
                'invoice_id' => $invoice->id,
                'customer_id' => $invoice->customer_id,
                'invoice_number' => $invoice->number,
                'amount_due' => $invoice->total_amount,
                'due_date' => $invoice->due_date
            ]);
            
            DB::commit();

            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Contratação de serviço!",
                "icon" => "success",
                "text" => "Uma fatura com o número ". $invoice->number ." foi gerada, dirija-se ao setor financeiro para efetuar o pagamento."
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Prestação de Serviço!",
                "icon" => "success",
                "text" => "A actividade de ". $service_order->service->name. " foi solicitada com sucesso! Dirija-se ao sector financeiro para efetuar o pagamento."
            ]);
        }
    }
}
