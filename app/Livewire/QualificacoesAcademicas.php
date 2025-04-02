<?php

namespace App\Livewire;

use Livewire\Component;

class QualificacoesAcademicas extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.qualificacoes-academicas');
    }

    public function atualizar()
    {
    }
}
