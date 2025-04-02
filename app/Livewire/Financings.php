<?php

namespace App\Livewire;

use App\Models\Financier;
use App\Models\Financing;
use Livewire\Component;
use Livewire\WithPagination;

class Financings extends Component
{
    use WithPagination;

    public $start_date, $end_date, $financiador;

    private $financiadores = [];

    public function render()
    {
        $financings = Financing::orderBy("id", "desc")->paginate(4);
        $financiadores = Financier::all();
        return view('livewire.funders.financings')->with(["financings" => $financings, "financiadores" => $financiadores]);
    }

    public function printRelatoty()
    {
        $financings = Financing::where("start_date", ">=", $this->start_date)->where("end_date", "<=", $this->end_date)->get();

        foreach ($financings as $key => $financing) {
            if ($this->financiador == "all") {
                $this->financiadores[] = $financing;
            } else {
                if ($this->financiador == $financing->financier_id) {
                    $this->financiadores[] = $financing;
                }
            }
            
        }

        dd($this->financiadores);
    }

    public function atualizar()
    {
    }
}
