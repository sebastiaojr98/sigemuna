<?php

namespace App\Livewire;

use Livewire\Component;

class DomicilioBancario extends Component
{
    public $employee;

    public $update = false;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.domicilio-bancario');
    }


    public function atualizar()
    {
        $this->update = true;
    }
}
