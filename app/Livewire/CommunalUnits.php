<?php

namespace App\Livewire;

use App\Models\CommunalUnity;
use Livewire\Component;
use Livewire\WithPagination;

class CommunalUnits extends Component
{
    use WithPagination;

    public function render()
    {
        $communal_units = CommunalUnity::orderBy("label", "asc")->paginate(5);
        return view('livewire.communal-units')->with(["communal_units" => $communal_units]);
    }

    public function atualizar()
    {
    }
}
