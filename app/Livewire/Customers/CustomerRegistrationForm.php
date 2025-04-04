<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerDocument;
use App\Models\DocumentType;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerRegistrationForm extends Component
{
    use WithFileUploads;

    public $step = 1;

    public $typeCustomer = '';
    public $name = '';
    public $nuit = '';
    public $phone = '';
    public $secondaryPhone = '';
    public $email = '';

    public $documentType = '';
    public $expirationDate = '';
    public $file = '';
    public $observation = '';


    public array $documents = [];


    public string $neighborhood = '';
    public string $street = '';
    public string $streetNumber = '';
    public string $reference = '';

    public function render()
    {
        $typeCustomers = [
            ['name' => "PF", "description" => "Pessoa Física"],
            ['name' => "PJ", "description" => "Pessoa Jurídica"],
        ];

        $documentTypes = DocumentType::all(['id', 'description']);
        $neighborhoods = Neighborhood::all(['id', 'label']);
        return view('livewire.customers.customer-registration-form')
            ->with(["typeCustomers" => $typeCustomers, "documentTypes" => $documentTypes, "neighborhoods" => $neighborhoods]);
    }

    public function nextStep(): void
    {
        switch ($this->step) {
            case '1':
                $this->validate([
                    'typeCustomer' => 'required|size:2',
                    'name' => 'required|min:3|max:20',
                    'nuit' => 'nullable|size:9',
                    'phone'=> 'required|size:9',
                    'secondaryPhone' => 'nullable|size:9',
                    'email' => 'nullable|min:6|max:50'
                ]);
            break;
        }

        $this->step++;
    }

    public function prevStep(): void
    {
        $this->step--;
    }

    public function addDocument(): void
    {
        $this->validate([
            'documentType' => 'required|exists:document_types,id',
            'expirationDate' => 'nullable|date',
            'file' => 'required|file|mimes:pdf|max:5120',
            'observation' => 'nullable|string|min:5|max:120'
        ]);

        $label = DocumentType::find($this->documentType);

        $this->documents[] = [
            'label' => $label->description,
            'documentType' => $this->documentType,
            'expirationDate' => $this->expirationDate,
            'file' => $this->file,
            'observation' => $this->observation
        ];

        $this->reset(['documentType', 'expirationDate', 'file', 'observation']);
    }

    public function createCustomer(): void
    {
        $this->validate([
            'neighborhood' => 'required|exists:neighborhoods,id',
            'street' => 'string|max:150',
            'streetNumber' => 'numeric|min:1|max:99999',
            'reference' => 'nullable|string|max:255',
        ]);

        
        //Cadastrando o Cliente
        DB::beginTransaction();

        try {
            
            $customer = Customer::create([
                'type_customer' => $this->typeCustomer,
                'name' => $this->name,
                'nuit' => $this->nuit,
                'phone'=> $this->phone,
                'secondary_phone' => $this->secondaryPhone,
                'email' => $this->email
            ]);

            foreach ($this->documents as $doc) {

                $path = $doc['file']->store('customers/documents');

                CustomerDocument::create([
                    'document_type_id' => $doc['documentType'],
                    'expires_at' => $this->expirationDate ? $this->expirationDate : null,
                    'file_path' => $path,
                    'customer_id' => $customer->id,
                    'notes' => $this->observation
                ]);

            }

            CustomerAddress::create([
                'neighborhood_id' => $this->neighborhood,
                'street' => $this->street,
                'number' => $this->streetNumber,
                'customer_id' => $customer->id,
                'reference' => $this->reference,
            ]);

            DB::commit();
            $this->clearFields();

            redirect()->route('customer', $customer->id);

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }


    private function clearFields(): void
    {
        $this->reset(['typeCustomer', 'name', 'nuit', 'phone', 'secondaryPhone', 'email']);
        $this->reset(['documentType', 'expirationDate', 'file', 'observation']);
        $this->reset(['neighborhood', 'street', 'streetNumber', 'reference']);
        $this->reset('documents');
    }
}
