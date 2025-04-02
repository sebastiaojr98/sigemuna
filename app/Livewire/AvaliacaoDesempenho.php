<?php

namespace App\Livewire;

use Livewire\Component;

class AvaliacaoDesempenho extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.avaliacao-desempenho');
    }

    public function atualizar()
    {
    }
}
