<?php

namespace App\Livewire;

use App\Models\AcademicQualification;
use App\Models\Nationality;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioQualificacaoAcademica extends Component
{
    use WithFileUploads;

    public $academic_level, $conclusion_year, $course, $country_of_training, $document, $educational_institution;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $nationalities = Nationality::get();

        return view('livewire.employee.formulario-qualificacao-academica')->with([
            "nationalities" => $nationalities
        ]);
    }

    public function createSpouse($employee)
    {
        $this->validate([
            'academic_level' => 'required',
            'conclusion_year' => 'required',
            'course' => 'required',
            'country_of_training' => 'required',
            'educational_institution' => "required",
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_academic_qualification_documents") : null;
            
            AcademicQualification::create([
                'academic_level' => $this->academic_level,
                'conclusion_year' => $this->conclusion_year,
                'course' => $this->course,
                'country_of_training_id' => $this->country_of_training,
                'document' => $file,
                'educational_institution' => $this->educational_institution,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#qualificacaoAcademica", //id do modal
                "title" => "Qualificação Academica!",
                "icon" => "success",
                "text" => "Uma qualificação academica foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
