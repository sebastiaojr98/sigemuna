<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public function render()
    {
        $services = Service::orderBy("name", "asc")->paginate(5);
        return view('livewire.services')->with(["services" => $services]);
    }
}
