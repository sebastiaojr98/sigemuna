<?php

namespace App\Livewire\Customers;

use App\Models\AccountReceivable;
use App\Models\Invoice;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\ServiceContracted;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
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

    public function render(): View
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
                'user_create_id' => auth()->user()->id
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

            $this->dispatch('updateComponent')->to(Customer::class);

            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Sucesso!",
                "icon" => "success",
                "text" => "Uma fatura com o número ". $invoice->number ." foi gerada, dirija-se ao setor financeiro para efetuar o pagamento."
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Falha!",
                "icon" => "error",
                "text" => "Falha ao solicitar o servico, tenta novamente mais tarde."
            ]);
        }
    }
}
