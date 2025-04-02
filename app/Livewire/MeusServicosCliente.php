<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceOrder;

class MeusServicosCliente extends Component
{
    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }
    
    public function render()
    {
        $services = ServiceOrder::where("client_id", "=", $this->client->id)->get();
        return view('livewire.client.meus-servicos-cliente')->with([
            "services" => $services
        ]);
    }

    public function atualizar()
    {
    }
}
