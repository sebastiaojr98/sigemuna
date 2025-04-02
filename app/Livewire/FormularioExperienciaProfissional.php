<?php

namespace App\Livewire;

use App\Models\ProfessionalExperience;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioExperienciaProfissional extends Component
{
    use WithFileUploads;

    public $employer , $function_performed, $begin, $finish, $document;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.formulario-experiencia-profissional');
    }

    public function createExperience($employee)
    {
        $this->validate([
            'employer' => 'required',
            'function_performed' => 'required',
            'begin' => 'required',
            'finish' => 'nullable',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_professional_experience_documents") : null;
            
            ProfessionalExperience::create([
                'employer' => $this->employer,
                'function_performed' => $this->function_performed,
                'begin' => $this->begin,
                'finish' => $this->finish ? $this->finish : null,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#experienciaProfissional", //id do modal
                "title" => "Experiencia Profissional!",
                "icon" => "success",
                "text" => "Uma experiencia profissional foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
