<?php

namespace App\Livewire;

use Livewire\Component;

class ContactosPessoais extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.contactos-pessoais');
    }

    public function atualizar()
    {
    }
}
