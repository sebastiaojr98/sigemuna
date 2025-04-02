<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\TypeExpense;
use Livewire\Component;
use Dompdf\Dompdf;
use Dompdf\Options;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Support\Traits\Logo;
use phputil\extenso\Extenso;

class Expenses extends Component
{
    use WithPagination;
    use Logo;

    public $expense_type, $start_date, $end_date;

    private $expenses;

    //busaa
    private $search_expense;

    public $expense_types;


    public function mount()
    {
        $this->start_date = date("Y-m-d");
        $this->end_date = date("Y-m-d");
        $this->expense_types = TypeExpense::orderBy('id', 'desc')->get();
    }


    public function render()
    {
        $expense_year = Expense::whereYear("expense_date", date("Y"))->sum("amount");

        $year = date("Y");
        $month = date("m") - 1;

        $month == 0 ? $month = 12 && $year = $year - 1 : $month = $month;
        
        $expense_last_month = Expense::whereYear("expense_date", $year)->whereMonth("expense_date", $month)->sum("amount");
        $expense_current_month = Expense::whereYear("expense_date", date("Y"))->whereMonth("expense_date", date("m"))->sum("amount");

        if ($this->search_expense):
            $expenses = Expense::where("reference", "LIKE", "%{$this->search_expense}%")->paginate(4);
        else:
            $expenses = Expense::whereMonth("created_at", date("m"))->paginate(4);
        endif;

        return view('livewire.expenses')->with(["expenses" => $expenses, "expense_year" => $expense_year, "expense_last_month" => $expense_last_month, "expense_current_month" => $expense_current_month]);
    }

    public function createReport()
    {
    
        $expense_types = TypeExpense::all();
        //dd($expense_types);
        //Criando o Filtro de Tipo de Despesa
        if($this->expense_type == "all"):
            $expense_type = "Todos";
            $this->expenses = Expense::where("expense_date", ">=", $this->start_date)->where("expense_date", "<=", $this->end_date)->orderBy("id", "desc")->get();
        else:
            $this->expenses = Expense::where("expense_date", ">=", $this->start_date)->where("expense_date", "<=", $this->end_date)->where("type_expense_id", "=", $this->expense_type)->orderBy("id", "desc")->get();
            $expense_type = TypeExpense::find($this->expense_type);
            $expense_type = $expense_type->label;
        endif;

        foreach ($this->expenses as $key => $expense) {
            foreach ($expense_types as $key => $type) {
                
                if ($expense->type_expense_id == $type->id) {
                    $type->amount = $type->amount + $expense->amount;
                }
            }
        }
        
        $relatory = view("relatories.expenses", [
            "logo" => $this->createLogo(),
            "logo_cmcn" => $this->createLogoCMCN(),
            "expenses" => $this->expenses,
            "expense_types" => $expense_types,
            "total" => $expense_types->sum("amount"),
            "expense_type" => $expense_type,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->setPaper("A4", "landscape");
        $dompdf->loadHtml($relatory);
        $dompdf->setOptions(new Options([
                'isPhpEnabled' => true,
            ]));

        $dompdf->render();

        $nomeDoArquivo = 'despesas'.date("-Y-m-d-H-i-s").'.pdf';
        //$caminhoDoArquivo = storage_path("app/public/relatories/$nomeDoArquivo");
        $caminhoDoArquivo = "expenses/$nomeDoArquivo";


        try {
            Storage::disk("public")->put($caminhoDoArquivo, $dompdf->output());
            return Storage::disk("public")->download($caminhoDoArquivo, $nomeDoArquivo);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function search($value)
    {
        $this->search_expense = $value;
    }

    public function atualizar()
    {
    }
}
