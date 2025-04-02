<?php

namespace App\Livewire;

use App\Models\ProvisionalAppointment;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioNomeacaoProvisoria extends Component
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
        return view('livewire.employee.formulario-nomeacao-provisoria');
    }

    public function createProvisionalAppointment($employee)
    {
        $this->validate([
            'process_code' => 'required',
            'dispatch_process' => 'required',
            'dispatch_date' => 'required|date',
            'visa_date' => 'required|date',
            'document' => 'required|file|mimes:pdf',
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_provisional_appointment_documents") : null;
            
            ProvisionalAppointment::create([
                'process_code' => $this->process_code,
                'dispatch' => $this->dispatch_process,
                'dispatch_date' => $this->dispatch_date,
                'visa_date' => $this->visa_date,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#nomeacaoProvisoria", //id do modal
                "title" => "Nomeação Provisoria!",
                "icon" => "success",
                "text" => "A nomeação provisoria foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
