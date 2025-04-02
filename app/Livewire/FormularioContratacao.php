<?php

namespace App\Livewire;

use App\Models\Hiring;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioContratacao extends Component
{
    use WithFileUploads;

    public $process_code, $dispatch_process, $dispatch_date, $visa_date, $document, $start_of_functions;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.formulario-contratacao');
    }

    public function createHiring($employee)
    {
        $this->validate([
            'process_code' => 'required',
            'dispatch_process' => 'required',
            'dispatch_date' => 'required|date',
            'visa_date' => 'required|date',
            'start_of_functions' => "required|date",
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_hiring_documents") : null;
            
            Hiring::create([
                'process_code' => $this->process_code,
                'dispatch' => $this->dispatch_process,
                'dispatch_date' => $this->dispatch_date,
                'visa_date' => $this->visa_date,
                'document' => $file,
                'start_of_functions' => $this->start_of_functions,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            return $this->dispatch("cadastrado", [
                "modal" => "#contratacao", //id do modal
                "title" => "Contratação!",
                "icon" => "success",
                "text" => "A contratação foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
