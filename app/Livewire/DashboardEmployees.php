<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class DashboardEmployees extends Component
{
    public $employee_status;

    public $employees, $active, $fired, $vacation, $suspended, $paternity, $maternity, $sick;

    public function mount()
    {
        $this->employees = Employee::all()->count();
        $this->active = Employee::where("working_status", "=", "1")->get()->count();
        $this->fired = Employee::where("working_status", "=", "0")->get()->count();
        $this->vacation = Employee::where("working_status", "=", "2")->get()->count();
        $this->suspended = Employee::where("working_status", "=", "3")->get()->count();
        $this->paternity = Employee::where("working_status", "=", "4")->get()->count();
        $this->maternity = Employee::where("working_status", "=", "5")->get()->count();
        $this->sick = Employee::where("working_status", "=", "6")->get()->count();

        $this->employee_status = [
            $this->employees,
            $this->active,
            $this->fired,
            $this->vacation,
            $this->suspended,
            $this->paternity,
            $this->maternity,
            $this->sick
        ];
    }

    public function render()
    {
        return view('livewire.dashboard-employees');
    }
}
