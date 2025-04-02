<?php

namespace App\Livewire;

use App\Models\EmployeeOccurrence;
use Livewire\Component;

class MinhasOcorrencias extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        $occourrences = EmployeeOccurrence::where("employee_id", "=", $this->employee->id)->get();
        return view('livewire.employee.minhas-ocorrencias', [
            "occourrences" => $occourrences
        ]);
    }

    public function atualizar()
    {
    }
}
