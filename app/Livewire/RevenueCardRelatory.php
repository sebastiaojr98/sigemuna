<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InternalRevenue;

class RevenueCardRelatory extends Component
{
    public function render()
    {
        $revenue_year = InternalRevenue::whereYear("revenue_date", date("Y"))->where("status", "=", "1")->sum("amount");

        $year = date("Y");
        $month = date("m") - 1;

        $month == 0 ? $month = 12 && $year = $year - 1 : $month = $month;
        
        $revenue_last_month = InternalRevenue::whereYear("revenue_date", $year)->whereMonth("revenue_date", $month)->where("status", "=", "1")->sum("amount");
        $revenue_current_month = InternalRevenue::whereYear("revenue_date", date("Y"))->whereMonth("revenue_date", date("m"))->where("status", "=", "1")->sum("amount");

        return view('livewire.revenue.revenue-card-relatory')->with(["revenue_year" => $revenue_year, "revenue_last_month" => $revenue_last_month, "revenue_current_month" => $revenue_current_month]);
    }
}
