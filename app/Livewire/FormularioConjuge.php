<?php

namespace App\Livewire;

use App\Models\Nationality;
use App\Models\Spouse;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioConjuge extends Component
{
    use WithFileUploads;

    public $full_name, $birth, $profession, $workplace, $document, $nationality;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }


    public function render()
    {
        $nationalities = Nationality::get();

        return view('livewire.employee.formulario-conjuge')->with([
            "nationalities" => $nationalities
        ]);
    }

    public function createSpouse($employee)
    {
        $this->validate([
            'full_name' => 'required|min:6',
            'birth' => 'required|date',
            'profession' => 'nullable',
            'workplace' => 'nullable',
            'nationality' => "required",
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_conjuge_documents") : null;
            
            Spouse::create([
                'full_name' => $this->full_name,
                'birth' => $this->birth,
                'profession' => $this->profession,
                'workplace' => $this->workplace,
                'document' => $file,
                'nationality_id' => $this->nationality,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            return $this->dispatch("cadastrado", [
                "modal" => "#conjuge", //id do modal
                "title" => "Cônjuge",
                "icon" => "success",
                "text" => "Cônjuge cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
