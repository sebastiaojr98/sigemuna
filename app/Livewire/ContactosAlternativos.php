<?php

namespace App\Livewire;

use Livewire\Component;

class ContactosAlternativos extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.contactos-alternativos');
    }

    public function atualizar()
    {
    }
}
