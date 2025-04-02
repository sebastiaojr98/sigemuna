<?php

namespace App\Livewire;

use App\Models\DocumentType;
use App\Models\MyDocumentClient;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioMeuDocumentoCliente extends Component
{
    use WithFileUploads;

    public $client, $document_type, $number, $place_of_issue, $date_of_issue, $expiration_date, $document;

    public  function mount($client)
    {
        $this->client = $client;
    }

    public function render()
    {
        $document_types = DocumentType::get();
        return view('livewire.client.formulario-meu-documento-cliente')->with(["document_types" => $document_types]);
    }

    public function createMyDocument($client)
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
            
            MyDocumentClient::create([
                'document_type_id' => $this->document_type,
                'number' => $this->number,
                'place_of_issue' => $this->place_of_issue,
                'date_of_issue' => $this->date_of_issue,
                'document' => $file,
                'expiration_date' => $this->expiration_date,
                'client_id' => $client,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
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
