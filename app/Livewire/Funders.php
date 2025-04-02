<?php

namespace App\Livewire;

use App\Models\Financier;
use App\Models\FinancierType;
use Livewire\Component;
use Livewire\WithPagination;

class Funders extends Component
{
    use WithPagination;

    public $financier;

    private $financiers = [];

    public function render()
    {
        $funders = Financier::paginate(4);
        $financier_types = FinancierType::all();
        return view('livewire.funders')->with(["funders" => $funders, "financier_types" => $financier_types]);
    }

    
    public function printRelatory()
    {
        $financiers = Financier::all();

        foreach ($financiers as $key => $financier) {
            if ($this->financier == "all") {
                $this->financiers[] = $financier;
            } else {
                if ($this->financier == $financier->financier_type_id) {
                    $this->financiers[] = $financier;
                }
            }
            
        }

        dd($this->financiers);
    }

    public function atualizar()
    {
    }
}
