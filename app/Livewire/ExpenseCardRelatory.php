<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;

class ExpenseCardRelatory extends Component
{
    public function render()
    {
        $expense_year = Expense::whereYear("expense_date", date("Y"))->sum("amount");

        $year = date("Y");
        $month = date("m") - 1;

        $month == 0 ? $month = 12 && $year = $year - 1 : $month = $month;
        
        $expense_last_month = Expense::whereYear("expense_date", $year)->whereMonth("expense_date", $month)->sum("amount");
        $expense_current_month = Expense::whereYear("expense_date", date("Y"))->whereMonth("expense_date", date("m"))->sum("amount");

        return view('livewire.expense.expense-card-relatory')->with(["expense_year" => $expense_year, "expense_last_month" => $expense_last_month, "expense_current_month" => $expense_current_month]);
    }
}
