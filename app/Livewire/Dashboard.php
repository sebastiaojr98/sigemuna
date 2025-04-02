<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\LicenseOrder;
use Livewire\Component;

class Dashboard extends Component
{
    public $chart_clients, $chart_licenses;
    
    public $clients, $licenses, $valid_licenses, $expired_licenses;

    public $physical_person, $legal_entities;

    public function mount()
    {
        $this->clients = Client::all()->count();
        $this->licenses = LicenseOrder::all()->count();
        $this->valid_licenses = LicenseOrder::where("due_date", ">=", date("Y-m-d"))->get()->count();
        $this->expired_licenses = LicenseOrder::where("due_date", "<", date("Y-m-d"))->get()->count();

        //Clientes
        $this->physical_person = Client::where("account_type_id", "=", "1")->get()->count();
        $this->legal_entities = Client::where("account_type_id", "=", "2")->get()->count();
    }

    public function render()
    {
        $this->chart_licenses  = [$this->licenses, $this->valid_licenses, $this->expired_licenses];
        $this->chart_clients = [$this->clients, $this->legal_entities, $this->physical_person];
        return view('livewire.dashboard');
    }

    public function update(){

    }
}
