<?php

namespace App\Livewire;

use App\Models\SubService;
use Livewire\Component;
use Livewire\WithPagination;

class SubServices extends Component
{
    use WithPagination;
    
    public function render()
    {
        $sub_services = SubService::paginate(5);
        return view('livewire.sub-services')->with(["sub_services" => $sub_services]);
    }
}
