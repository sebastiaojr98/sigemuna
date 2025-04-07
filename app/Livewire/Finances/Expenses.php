<?php

namespace App\Livewire\Finances;

use App\Models\Expense;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;
use Livewire\WithPagination;

class Expenses extends Component
{
    use WithPagination;

    public function render()
    {
        $expenses = Expense::with(['category', 'supplier'])
            ->orderBy('is_recurring', 'asc')
            ->orderBy('start_date', 'desc')
            ->paginate(3);
            
        return view('livewire.finances.expenses')->with([
            "expenses" => $expenses
        ]);
    }


    public function disableExpense(Expense $expense): Event
    {
        try{
            $expense->is_recurring = "Não";
            $expense->save();

            return $this->dispatch("cadastrado", [
                "modal" => "#createExpense",
                "title" => "Sucesso!",
                "icon" => "success",
                "text" => "Recorrencia da despesa desativada com sucesso."
            ]);
        }catch(\Exception $e){
            return $this->dispatch("cadastrado", [
                "modal" => "#createExpense",
                "title" => "Falha!",
                "icon" => "error",
                "text" => "Falha ao desativar a recorrencia da despesa, tenta novamente mais tarde."
            ]);
        }
    }
}
