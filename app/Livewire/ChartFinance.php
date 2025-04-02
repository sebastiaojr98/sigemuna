<?php

namespace App\Livewire;

use Livewire\Component;

class ChartFinance extends Component
{
    public $data;

    public function mount($dataCharts)
    {
        $this->data = json_encode($dataCharts);
    }
    
    public function render()
    {
        return view('livewire.chart-finance');
    }
}
