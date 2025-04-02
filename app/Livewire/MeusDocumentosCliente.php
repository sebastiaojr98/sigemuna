<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MyDocumentClient;

class MeusDocumentosCliente extends Component
{
    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }
    
    public function render()
    {
        $documents = MyDocumentClient::where("client_id", "=", $this->client->id)->get();
        
        return view('livewire.client.meus-documentos-cliente')->with([
            "documents" => $documents 
        ]);
    }

    public function atualizar()
    {
    }
}
