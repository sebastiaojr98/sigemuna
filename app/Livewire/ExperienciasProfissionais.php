<?php

namespace App\Livewire;

use Livewire\Component;

class ExperienciasProfissionais extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.experiencias-profissionais');
    }

    public function atualizar()
    {
    }
}
