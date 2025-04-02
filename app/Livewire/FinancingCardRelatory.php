<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Financing;

class FinancingCardRelatory extends Component
{
    public function render()
    {
        $canceled = Financing::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "0")->sum("amount");
        $active = Financing::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "1")->sum("amount");
        $completed = Financing::where("end_date", ">=", date("Y-m-1"))->where("status", "=", "2")->sum("amount");

        return view('livewire.funders.financing-card-relatory',[
            "active" => $active,
            "completed" => $completed,
            "canceled" => $canceled
        ]);
    }
}
