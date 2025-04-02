<?php

namespace App\Livewire;

use Livewire\Component;

class Contratacao extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.contratacao');
    }

    public function atualizar()
    {
    }
}
