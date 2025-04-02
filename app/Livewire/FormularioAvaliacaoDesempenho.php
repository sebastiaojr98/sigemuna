<?php

namespace App\Livewire;

use App\Models\PerformanceEvaluation;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioAvaliacaoDesempenho extends Component
{
    use WithFileUploads;

    public $year, $note, $document;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.formulario-avaliacao-desempenho');
    }

    public function createPerformanceEvaluation($employee)
    {
        $this->validate([
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'note' => 'required|numeric|max:20',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_performance_evaluation_documents") : null;
            
            $performace = PerformanceEvaluation::create([
                'year' => $this->year,
                'note' => $this->note,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);

            return $this->dispatch("cadastrado", [
                "modal" => "#avaliacaoDesempenho", //id do modal
                "title" => "AVALIAÇÃO DE DESEMPENHO",
                "icon" => "success",
                "text" => "Uma avaliação de desempenho foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
