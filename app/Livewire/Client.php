<?php

namespace App\Livewire;

use App\Models\Client as ModelsClient;
use Livewire\Component;

class Client extends Component
{
    private $client;

    public function mount(ModelsClient $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client')->with(["client" => $this->client]);
    }
}
