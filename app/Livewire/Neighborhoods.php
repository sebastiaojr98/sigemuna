<?php

namespace App\Livewire;

use App\Models\Neighborhood;
use Livewire\Component;
use Livewire\WithPagination;

class Neighborhoods extends Component
{
    use WithPagination;

    public function render()
    {
        $neighborhoods = Neighborhood::orderBy("label", "asc")->paginate(5);
        return view('livewire.neighborhoods')->with(["neighborhoods" => $neighborhoods]);
    }


    public function atualizar()
    {
    }
}
