<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\TypeExpense;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

use phputil\extenso\Extenso;

class FormularioDespesas extends Component
{
    use WithFileUploads;

    public $process_code, $type_expense, $amount, $expense_date, $description, $document;

    public function render()
    {
        $type_exepenses = TypeExpense::get();
        return view('livewire.expense.formulario-despesas')->with(["type_expenses" => $type_exepenses]);
    }


    public function createExpense()
    {
        $this->validate([
            'process_code' => 'required',
            'type_expense' => 'required',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
            'description' => "required",
            'document' => 'required|file|mimes:pdf',
        ]);

        try {
            $file = $this->document ? $this->document->store("expenses_documents") : null;
            
            $expense = Expense::create([
                'reference' => $this->process_code,
                'type_expense_id' => $this->type_expense,
                'amount' => $this->amount,
                'expense_date' => $this->expense_date,
                'description' => $this->description,
                'document' => $file,
                'user_create_id' => auth()->user()->id
            ]);

            $e = new Extenso();
            $e = $e->extenso($expense->amount, Extenso::MOEDA);
            $e = str_replace(["real", "reais"], ["metical", "meticais"], $e);

            $this->clearAttr();
            return $this->dispatch("cadastrado", [
                "modal" => "#createExpense", //id do modal
                "title" => "Despesa!",
                "icon" => "success",
                "text" => "Uma despesa no valor de: ".number_format($expense->amount, 2, ".", " "). "MT ({$e}) relacionada a ". $expense->typeExpense->label. " foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function clearAttr()
    {
        $this->process_code = "";
        $this->amount = "";
        $this->type_expense = "";
        $this->expense_date = "";
        $this->description = "";
        $this->document = "";
    }
}
