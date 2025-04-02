<?php

namespace App\Livewire;

use App\Models\License;
use Livewire\Component;
use Livewire\WithPagination;

class Licenses extends Component
{
    use WithPagination;
    
    public function render()
    {
        $licenses = License::orderBy("name", "asc")->paginate(5);
        return view('livewire.licenses')->with(["licenses" => $licenses]);
    }
}
