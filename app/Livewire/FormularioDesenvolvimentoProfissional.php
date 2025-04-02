<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\PositionCompany;
use App\Models\ProfessionalDevelopment;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioDesenvolvimentoProfissional extends Component
{
    use WithFileUploads;

    public $position_companies = [], $departments = [];

    public $department, $position_company, $process_code, $category, $dispatch_process, $dispatch_date, $visa_date, $document, $begin, $finish;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }


    public function render()
    {
        $this->departments = Department::get();
        return view('livewire.employee.formulario-desenvolvimento-profissional');
    }

    public function setPositionCompany()
    {
        $this->position_companies = PositionCompany::where("department_id", "=", $this->department)->get();
    }

    public function createProfessionalDevelopment($employee)
    {
        $this->validate([
            'department' => 'required',
            'process_code' => 'required',
            'position_company' => 'required',
            'category' => 'required',
            'dispatch_process' => 'required',
            'dispatch_date' => 'required|date',
            'visa_date' => 'required|date',
            'begin' => 'required|date',
            'finish' => 'nullable|date',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_professional_development_documents") : null;
            
            ProfessionalDevelopment::create([
                'department_id' => $this->department,
                'process_code' => $this->process_code,
                'position_company_id' => $this->position_company,
                'category' => $this->category,
                'dispatch_process' => $this->dispatch_process,
                'dispatch_date' => $this->dispatch_date,
                'visa_date' => $this->visa_date,
                'begin' => $this->begin,
                'finish' => $this->finish ? $this->finish : null,
                'document' => $file,

                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#desenvolvimentoProfissional", //id do modal
                "title" => "Desenvolvimento Profissional!",
                "icon" => "success",
                "text" => "O Desenvolvimento Profissional foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
