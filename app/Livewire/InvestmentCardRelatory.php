<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Investment;

class InvestmentCardRelatory extends Component
{
    public function render()
    {
        $canceled = Investment::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "0")->sum("amount");
        $active = Investment::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "1")->sum("amount");
        $completed = Investment::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "2")->sum("amount");

        return view('livewire.investors.investment-card-relatory',[
            "active" => $active,
            "completed" => $completed,
            "canceled" => $canceled
        ]);
    }
}
