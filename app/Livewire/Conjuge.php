<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Spouse;

class Conjuge extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        $spouse = Spouse::where("employee_id", "=", $this->employee->id)->orderBy("id", "desc")->first();
        return view('livewire.employee.conjuge')->with([
            "spouse" => $spouse
        ]);
    }

    public function atualizar()
    {
    }
}
