<?php

namespace App\Livewire;

use Livewire\Component;

class DesenvolvimentoProfissionalInterno extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    
    public function render()
    {
        return view('livewire.employee.desenvolvimento-profissional-interno');
    }

    public function atualizar()
    {
    }
}
