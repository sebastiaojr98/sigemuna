<?php

namespace App\Livewire;

use Livewire\Component;

class ChartInfra extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = json_encode($data);
    }

    public function render()
    {
        return view('livewire.infrastructures.chart-infra');
    }
}
