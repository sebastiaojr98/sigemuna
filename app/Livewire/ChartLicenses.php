<?php

namespace App\Livewire;

use Livewire\Component;

class ChartLicenses extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = json_encode($data);
    }

    public function render()
    {

        return view('livewire.client.chart-licenses');
    }
}
