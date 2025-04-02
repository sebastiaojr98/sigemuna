<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Financing;
use App\Models\InternalRevenue;
use App\Models\Investment;
use Livewire\Component;

class DashboardFinance extends Component
{
    public $dataCharts;

    public $total, $revenue, $expense, $investment, $financing;

    public function mount()
    {
        $this->revenue = InternalRevenue::where("status", "=", "1")->sum("amount");
        $this->expense = Expense::sum("amount");
        $this->investment = Investment::where("status", "=", "1")->sum("amount");
        $this->financing = Financing::where("status", "=", "1")->sum("amount");
        $this->total = $this->revenue + $this->investment + $this->financing - $this->expense;

        $this->dataCharts = [
            floatval(number_format($this->revenue, 2, ".", "")),
            floatval(number_format($this->expense, 2, ".", "")),
            floatval(number_format($this->investment, 2, ".", "")),
            floatval(number_format($this->financing, 2, ".", "")),
            floatval(number_format($this->total, 2, ".", ""))
        ];
    }


    public function render()
    {
        return view('livewire.dashboard-finance');
    }
}
