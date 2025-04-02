<?php

namespace App\Livewire;

use App\Models\EmployeeAddress;
use Livewire\Component;

class Residencia extends Component
{
    public $addresses, $employee;

    public $update = false;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $this->addresses = $this->employee->employeeAddress;
        return view('livewire.employee.residencia')->with(["addresses" => $this->addresses]);
    }

    public function atualizar()
    {
        $this->update = true;
    }
}
