<?php

namespace App\Livewire\Suppliers;

use App\Models\DocumentType;
use App\Models\Supplier;
use App\Models\SupplierDocument;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;
use Livewire\WithFileUploads;

class SupplierRegistrationForm extends Component
{

    use WithFileUploads;

    public $step = 1;

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


    public string $address = '';

    public function render()
    {
        $documentTypes = DocumentType::all(['id', 'description']);

        return view('livewire.suppliers.supplier-registration-form')
            ->with([
                "documentTypes" => $documentTypes
            ]);
    }


    public function nextStep(): void
    {
        switch ($this->step) {
            case '1':
                $this->validate([
                    'name' => 'required|min:3|max:50',
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
            'observation' => $this->observation ? $this->observation : ''
        ];

        $this->reset(['documentType', 'expirationDate', 'file', 'observation']);
    }

    public function createSupplier(): Event|\Exception
    {
        $this->validate([
            'address' => 'required|min:5|max:70',
        ]);

        DB::beginTransaction();

        try {
            $su = Supplier::create([
                'name' => $this->name,
                'email' => $this->email ? $this->email : null,
                'phone' => $this->phone,
                'secondary_phone' => $this->secondaryPhone ? $this->secondaryPhone : null,
                'address' => $this->address,
                'nuit' => $this->nuit ? $this->nuit : null,
                'user_create_id' => auth()->user()->id
            ]);

            foreach ($this->documents as $doc) {

                $path = $doc['file']->store('suppliers/documents');

                SupplierDocument::create([
                    'document_type_id' => $doc['documentType'],
                    'expires_at' => $this->expirationDate ? $this->expirationDate : null,
                    'file_path' => $path,
                    'supplier_id' => $su->id,
                    'notes' => $doc['observation'],
                    'user_create_id' => auth()->user()->id
                ]);

            }
            DB::commit();
            $this->dispatch('updateComponent')->to(Suppliers::class);
            $this->clearFields();

            return $this->dispatch("cadastrado", [
                "modal" => "#createSupplier",
                "title" => "Sucesso!",
                "icon" => "success",
                "text" => "Fornecedor cadastrado com sucesso."
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->clearFields();
            return $this->dispatch("cadastrado", [
                "modal" => "#createSupplier",
                "title" => "Falha!",
                "icon" => "error",
                "text" => "Falha ao cadastrar fornecedor, tenta novamente mais tarde."
            ]);
        }
    }


    private function clearFields(): void
    {
        $this->step = 1;
        $this->reset([ 'name', 'nuit', 'phone', 'secondaryPhone', 'email', 'address']);
        $this->reset(['documentType', 'expirationDate', 'file', 'observation']);
        $this->reset('documents');
    }
}
