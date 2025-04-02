<?php

namespace App\Livewire;

use Livewire\Component;

class NomeacaoDefinitiva extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        return view('livewire.employee.nomeacao-definitiva');
    }

    public function atualizar()
    {
    }
}
