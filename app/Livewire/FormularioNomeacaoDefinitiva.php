<?php

namespace App\Livewire;

use App\Models\DefinitiveAppointment;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioNomeacaoDefinitiva extends Component
{
    use WithFileUploads;

    public $process_code, $dispatch_process, $dispatch_date, $visa_date, $document;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.formulario-nomeacao-definitiva');
    }

    public function createDefinitiveAppointment($employee)
    {
        $this->validate([
            'process_code' => 'required',
            'dispatch_process' => 'required',
            'dispatch_date' => 'required|date',
            'visa_date' => 'required|date',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_definitive_appointment_documents") : null;
            
            DefinitiveAppointment::create([
                'process_code' => $this->process_code,
                'dispatch' => $this->dispatch_process,
                'dispatch_date' => $this->dispatch_date,
                'visa_date' => $this->visa_date,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#nomeacaoDefinitiva", //id do modal
                "title" => "Nomeação Definitiva!",
                "icon" => "success",
                "text" => "A nomeação definitiva foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
