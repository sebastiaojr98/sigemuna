<?php

namespace App\Livewire;

use App\Models\AlternativeContact;
use App\Models\DegreeOfKinship;
use Exception;
use Livewire\Component;

class FormularioContactoAlternativo extends Component
{
    public $degree_of_kinship, $full_name, $phone, $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $degree_of_kinships = DegreeOfKinship::get();

        return view('livewire.employee.formulario-contacto-alternativo')->with([
            "degree_of_kinships" => $degree_of_kinships
        ]);
    }

    public function createContact($employee)
    {
        $this->validate([
            'degree_of_kinship' => 'required',
            'full_name' => 'required|min:8',
            'phone' => 'required|min:7',
        ]);

        
        try {
            AlternativeContact::create([
                'degree_of_kinship_id' => $this->degree_of_kinship,
                'full_name' => $this->full_name,
                'phone' => $this->phone,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#alternativePerson", //id do modal
                "title" => "Contacto Alternativo!",
                "icon" => "success",
                "text" => "Um contacto alternativo foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
