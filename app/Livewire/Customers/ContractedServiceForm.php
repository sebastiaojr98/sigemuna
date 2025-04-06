<?php

namespace App\Livewire\Customers;

use App\Models\AccountReceivable;
use App\Models\CommunalUnity;
use App\Models\Invoice;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\ServiceContracted;
use App\Services\Customer\LicenseCustomerService;
use App\Services\Finance\AccountReceivableService;
use App\Services\Finance\InvoiceService;
use App\Services\Finance\ServiceContractedService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Features\SupportEvents\Event;

class ContractedServiceForm extends Component
{
    public $customer;

    public string $serviceCategory = '';
    public string $service = '';

    public $services = [];

    public string $licenseType = '';

    public string $communalUnit = '';
    public string $houseNumber = '';
    public string $block = '';

    public string $carBrand = '';
    public string $carModel = '';
    public string $carRegistration = '';

    
    public  function mount($customer)
    {
        $this->customer = $customer;

    }

    public function render(): View
    {
        $serviceCategories = ServiceCategory::all();

        $communalUnits = CommunalUnity::all(['id', 'label']);
        return view('livewire.customers.contracted-service-form')
            ->with([
                "serviceCategories" => $serviceCategories,
                'communalUnits' => $communalUnits
            ]);
    }

    public function searchService(): void
    {
        
        $category = ServiceCategory::with('services')
            ->find($this->serviceCategory);

        $this->licenseType = $category->code;

        $this->services = $category->services;
        $this->reset(['service', 'communalUnit', 'houseNumber', 'block', 'carBrand', 'carModel', 'carRegistration']);

    }


    public function contractService(): Event
    {
        $this->validate([
            'serviceCategory' => 'required|exists:service_categories,id',
            'service' => 'required|exists:services,id'
        ]);

        if ($this->licenseType === "00001") {
            $this->validate([
                'communalUnit' => 'required|exists:communal_unities,id',
                'houseNumber' => 'integer|min:1|max:1000',
                'block' => 'integer|min:1|max:1000'
            ]);
        }

        if ($this->licenseType === "00002") {
            $this->validate([
                'carBrand' => 'required|min:5|max:20',
                'carModel' => 'required|min:5|max:20',
                'carRegistration' => 'required|min:5|max:15',
            ]);
        }

        DB::beginTransaction();

        try {

            $sc = ServiceContractedService::create($this->customer->id, $this->service);
            $isLicense = str_contains(strtolower($sc->service->name), "licença");
            $invoice = InvoiceService::create($sc->customer_id, $isLicense, $sc->id, $sc->service->base_price);
            AccountReceivableService::create($invoice->id, $invoice->customer_id, $invoice->number, $invoice->total_amount, $invoice->due_date);

            if ($isLicense && ($invoice->serviceContracted->service->category->code === "00001")) {
                LicenseCustomerService::supply($sc->id, $sc->customer_id, $this->houseNumber, $this->block, $this->communalUnit);
            }

            if ($isLicense && ($invoice->serviceContracted->service->category->code === "00002")) {
                LicenseCustomerService::transport($sc->id, $sc->customer_id, $this->carBrand, $this->carModel, $this->carRegistration); 
            }

            DB::commit();

            $this->dispatch('updateComponent')->to(Customer::class);
            $this->clearFields();

            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Sucesso!",
                "icon" => "success",
                "text" => "Uma fatura com o número ". $invoice->number ." foi gerada, dirija-se ao setor financeiro para efetuar o pagamento."
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            $this->clearFields();
            return $this->dispatch("cadastrado", [
                "modal" => "#meusServicos",
                "title" => "Falha!",
                "icon" => "error",
                "text" => "Falha ao solicitar o servico, tenta novamente mais tarde."
            ]);
        }
    }

    private function clearFields(): void
    {
        $this->serviceCategory = '';
        $this->service = '';
        $this->communalUnit = '';
        $this->houseNumber = '';
        $this->block = '';
        $this->carBrand = '';
        $this->carModel = '';
        $this->carRegistration = '';
    }
}
