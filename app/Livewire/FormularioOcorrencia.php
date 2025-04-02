<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Exception;
use App\Models\EmployeeOccurrence;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class FormularioOcorrencia extends Component
{
    use WithFileUploads;

    public $employee;

    public $status, $start_date, $end_date, $description, $document;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $statuses = [
            "0" => "Demitido",
            "1" => "Ativo",
            "2" => "Férias",
            "3" => "Suspenso",
            "4" => "Lic. Paternidade",
            "5" => "Lic. Maternidade",
            "6" => "Doente",
        ];
        return view('livewire.employee.formulario-ocorrencia', [
            "statuses" => $statuses
        ]);
    }

    public function createOccurrence(Employee $employee)
    {
        
        $this->validate([
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required',
            'document' => 'required|file|mimes:pdf',
        ]);

        DB::beginTransaction();
        try {
            $file = $this->document ? $this->document->store("employees_occurrences") : null;

            $employee->update([
                "working_status" => $this->status
            ]);

            EmployeeOccurrence::create([
                "start_date" => $this->start_date,
                "end_date" => $this->end_date,
                "description" => $this->description,
                "status" => "1",
                "employee_id" => $this->employee->id,
                "document" => $file,
                "user_id" => auth()->user()->id
            ]);
            DB::commit();

            $this->dispatch("cadastrado", [
                "modal" => "#ocorencia", //id do modal
                "title" => "OCORRÊNCIA!",
                "icon" => "success",
                "text" => "A ocorrencia foi registada com sucesso."
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
