<?php

namespace App\Livewire\Finances;

use App\Models\AccountPayable;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;

class ExpenseRegistrationForm extends Component
{
    public $step = 1;

    public string $category = '';
    public string $isRecurring = '';
    public string $frequency = '';
    public string $supplier = '';
    public string $amount = '';
    public string $startDate = '';
    public string $description = '';

    public function render()
    {
        $categories = ExpenseCategory::all(['id', 'name']);
        $suppliers = Supplier::all(['id', 'name']);
        $recurrencies = ["Não", "Sim"];
        $frequencies = ['Mensal', 'Trimestral', 'Anual'];

        //dd($this->isRecurring);
        return view('livewire.finances.expense-registration-form')->with([
            "categories" => $categories,
            "suppliers" => $suppliers,
            "recurrencies" => $recurrencies,
            "frequencies" => $frequencies
        ]);
    }


    public function setRecurrence(): void{}

    public function createExpense(): Event|\Exception
    {
        $this->validate([
            'category' => 'required|exists:expense_categories,id',
            'supplier' => 'required|exists:suppliers,id',
            'amount' => 'required|numeric|min:1',
            'startDate' => 'required|date',
            'isRecurring' => ['required', Rule::in(['Sim', 'Não'])],
            'frequency' => 'nullable|max:10',
            'description' => 'nullable|min:5|max:200'
        ]);

        if($this->isRecurring === "Sim"):
            $this->validate([
                'frequency' => ['required', Rule::in(['Mensal', 'Trimestral', 'Anual'])]
            ]);
        endif;

        DB::beginTransaction();

        try{
            $ex = Expense::create([
                'category_id' => $this->category,
                'supplier_id' => $this->supplier,
                'amount' => $this->amount,
                'start_date' => $this->startDate,
                'is_recurring' => $this->isRecurring,
                'frequency' => $this->frequency ? $this->frequency : null,
                'description' => $this->description ? $this->description : null,
                'user_create_id' => auth()->user()->id
            ]);

            if (($ex->is_recurring === "Sim") && ($ex->frequency === "Mensal")) {
                $dueDate = Carbon::parse($ex->start_date)->addMonth(1);
            }

            if (($ex->is_recurring === "Sim") && ($ex->frequency === "Trimestral")) {
                $dueDate = Carbon::parse($ex->start_date)->addMonth(3);
            }

            if (($ex->is_recurring === "Sim") && ($ex->frequency === "Anual")) {
                $dueDate = Carbon::parse($ex->start_date)->addMonth(12);
            }

            $ap = AccountPayable::create([
                'expense_id' => $ex->id,
                'supplier_id' => $ex->supplier_id,
                'amount_due' => $ex->amount,
                'due_date' => ($ex->is_recurring === "Sim") ? $dueDate : Carbon::parse($ex->start_date)->addMonth(1)
            ]);

            DB::commit();
            $this->reset([
                'category', 'isRecurring', 'frequency', 'supplier', 'amount', 'startDate', 'description'
            ]);
            
            return $this->dispatch("cadastrado", [
                "modal" => "#createExpense",
                "title" => "Sucesso!",
                "icon" => "success",
                "text" => "Despesa cadastrada com sucesso. Uma conta a pagar no montante de ". formatAmount($ap->amount_due) ."MT foi criada."
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return $this->dispatch("cadastrado", [
                "modal" => "#createExpense",
                "title" => "Falha!",
                "icon" => "error",
                "text" => "Falha ao cadastrar a despesa, tenta novamente mais tarde."
            ]);
        }

    }
}
