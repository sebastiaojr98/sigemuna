<?php

namespace App\Livewire;

use App\Models\Infrastructure;
use App\Models\InfrastructureHistory;
use Livewire\Component;

class DashboardInfra extends Component
{
    public $infras, $activities;

    public $operation, $closed, $maintenance;

    public function mount()
    {
        $this->operation = Infrastructure::where("status", "=", "1")->get()->count();
        $this->closed = Infrastructure::where("status", "=", "0")->get()->count();
        $this->maintenance = Infrastructure::where("status", "=", "2")->get()->count();

        $this->infras = [
            $this->operation + $this-> closed + $this->maintenance,
            $this->operation,
            $this->maintenance,
            $this->closed,
        ];

        $this->activities = InfrastructureHistory::take(7)->orderBy("id", "desc")->get();
    }

    public function render()
    {
        return view('livewire.dashboard-infra');
    }
}
