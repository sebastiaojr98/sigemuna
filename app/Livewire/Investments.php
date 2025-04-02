<?php

namespace App\Livewire;

use App\Models\Investment;
use App\Models\Investor;
use Livewire\Component;
use Livewire\WithPagination;

class Investments extends Component
{
    use WithPagination;

    public $start_date, $end_date, $investor;

    private $investors = [];

    public function render()
    {
        $investments = Investment::paginate(4);
        $investors = Investor::all();
        return view('livewire.investors.investments')->with(["investments" => $investments, "investors" => $investors]);
    }

    public function printRelatoty()
    {
        $investments = Investment::where("start_date", ">=", $this->start_date)->where("end_date", "<=", $this->end_date)->get();

        foreach ($investments as $key => $investment) {
            if ($this->investor == "all") {
                $this->investors[] = $investment;
            } else {
                if ($this->investor == $investment->investor_id) {
                    $this->investors[] = $investment;
                }
            }
            
        }

        dd($this->investors);
    }

    public function atualizar()
    {
    }
}
