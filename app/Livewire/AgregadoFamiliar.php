<?php

namespace App\Livewire;

use Livewire\Component;

class AgregadoFamiliar extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.agregado-familiar');
    }

    public function atualizar()
    {
    }
}
