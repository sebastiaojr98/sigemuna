<?php

namespace App\Livewire;

use App\Models\DocumentType;
use App\Models\ResponsiblePerson;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioPessoaResponsavel extends Component
{
    use WithFileUploads;

    public $client, $document_type, $number, $full_name, $phone, $document;

    public  function mount($client)
    {
        $this->client = $client;
    }


    public function render()
    {
        $document_types = DocumentType::get();
        return view('livewire.client.formulario-pessoa-responsavel')->with(["document_types" => $document_types]);
    }


    public function createResponsiblePerson($client)
    {
        $this->validate([
            'document_type' => 'required',
            'number' => 'required|min:6',
            'phone' => 'required|size:9',
            'full_name' => 'required',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("clients_id_documents") : null;
            
            ResponsiblePerson::create([
                'document_type_id' => $this->document_type,
                'document_number' => $this->number,
                'phone' => $this->phone,
                'full_name' => $this->full_name,
                'document' => $file,
                'client_id' => $client,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#pessoaResponsavel", //id do modal
                "title" => "Responsavel!",
                "icon" => "success",
                "text" => "Os dados do responsavel foram cadastrado com sucesso"
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
