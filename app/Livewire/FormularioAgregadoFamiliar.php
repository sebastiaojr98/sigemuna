<?php

namespace App\Livewire;

use App\Models\DegreeOfKinship;
use App\Models\Gender;
use App\Models\Household;
use App\Models\MaritalStatus;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioAgregadoFamiliar extends Component
{
    use WithFileUploads;

    public $full_name, $degree_of_kinship, $birth, $profession, $workplace, $document, $gender, $marital_status;

    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }


    public function render()
    {
        $genders = Gender::get();
        $degree_of_kinships = DegreeOfKinship::get();
        $marital_statuses = MaritalStatus::get();

        return view('livewire.employee.formulario-agregado-familiar')->with([
            "genders" => $genders,
            "degree_of_kinships" => $degree_of_kinships,
            "marital_statuses" => $marital_statuses
        ]);
    }

    public function createHousehold($employee)
    {
        $this->validate([
            'full_name' => 'required|min:6',
            'degree_of_kinship' => 'required',
            'birth' => 'required|date',
            'profession' => 'nullable',
            'workplace' => 'nullable',
            'gender' => 'required',
            'marital_status' => 'required',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_household_documents") : null;
            
            $household = Household::create([
                'full_name' => $this->full_name,
                'degree_of_kinship_id' => $this->degree_of_kinship,
                'birth' => $this->birth,
                'profession' => $this->profession,
                'workplace' => $this->workplace,
                'gender_id' => $this->gender,
                'marital_status_id' => $this->marital_status,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);

            return $this->dispatch("cadastrado", [
                "modal" => "#agregado_familiar", //id do modal
                "title" => "AGREGADO FAMILIAR",
                "icon" => "success",
                "text" => "Um membro do agregado familiar foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
