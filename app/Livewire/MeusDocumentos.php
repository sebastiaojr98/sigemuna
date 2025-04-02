<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MyDocument;

class MeusDocumentos extends Component
{
    public $employee;

    public $update = false;

    public function mount($employee)
    {
        $this->employee = $employee;
    }
    
    public function render()
    {
        $documents = MyDocument::where("employee_id", "=", $this->employee->id)->get();
        return view('livewire.employee.meus-documentos')->with([
            'myDocuments' => $documents
        ]);
    }

    public function atualizar()
    {
        $this->update = true;
    }
}
