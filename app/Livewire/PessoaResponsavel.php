<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResponsiblePerson;

class PessoaResponsavel extends Component
{
    public $client;

    public function mount($client)
    {
        $this->client = $client;
    }

    
    public function render()
    {
        $responsible_persons = ResponsiblePerson::where("client_id", "=", $this->client->id)->get();
        return view('livewire.client.pessoa-responsavel')->with([
            "responsible_persons" => $responsible_persons
        ]);
    }

    public function atualizar()
    {
    }
}
