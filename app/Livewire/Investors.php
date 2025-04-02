<?php

namespace App\Livewire;

use App\Models\Investor;
use App\Models\TypeInvestor;
use Livewire\Component;
use Livewire\WithPagination;

class Investors extends Component
{
    use WithPagination;

    private $investors = [];

    public $investor;

    public function render()
    {
        $investors = Investor::paginate(4);
        $investor_types = TypeInvestor::all();
        return view('livewire.investors')->with(["investors" => $investors, "investor_types" => $investor_types]);
    }


    public function printRelatory()
    {
        $investors = Investor::all();

        foreach ($investors as $key => $investor) {
            if ($this->investor == "all") {
                $this->investors[] = $investor;
            } else {
                if ($this->investor == $investor->investor_type_id) {
                    $this->investors[] = $investor;
                }
            }
            
        }

        dd($this->investors);
    }


    public function atualizar()
    {
    }
}
