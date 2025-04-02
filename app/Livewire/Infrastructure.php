<?php

namespace App\Livewire;

use App\Models\Infrastructure as ModelsInfrastructure;
use App\Models\InfrastructureHistory;
use Livewire\Component;
use Livewire\WithPagination;

class Infrastructure extends Component
{
    use WithPagination;

    public $infrastructure;

    public function mount(ModelsInfrastructure $infrastructure)
    {
        //dd($infrastructure);
    }
    

    public function render()
    {
        $histories = InfrastructureHistory::where("infrastructure_id", "=", $this->infrastructure->id)->orderBy("id", "desc")->paginate(4);
        return view('livewire.infrastructure')->with(["histories" => $histories]);
    }


    public function atualizar()
    {
    }
}
