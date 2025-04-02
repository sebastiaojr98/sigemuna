<?php

namespace App\Livewire;

use App\Models\DocumentType;
use App\Models\MyDocument;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioMeuDocumento extends Component
{
    use WithFileUploads;

    public $employee, $document_type, $number, $place_of_issue, $date_of_issue, $expiration_date, $document;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $document_types = DocumentType::get();

        return view('livewire.employee.formulario-meu-documento')->with(["document_types" => $document_types]);
    }

    public function createMyDocument($employee)
    {
        $this->validate([
            'document_type' => 'required',
            'number' => 'required|min:6',
            'place_of_issue' => 'required',
            'date_of_issue' => 'required|date',
            'expiration_date' => "nullable",
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_id_documents") : null;
            
            MyDocument::create([
                'document_type_id' => $this->document_type,
                'number' => $this->number,
                'place_of_issue' => $this->place_of_issue,
                'date_of_issue' => $this->date_of_issue,
                'document' => $file,
                'expiration_date' => $this->expiration_date,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            return $this->dispatch("cadastrado", [
                "modal" => "#documentos", //id do modal
                "title" => "Documento!",
                "icon" => "success",
                "text" => "O documento foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
