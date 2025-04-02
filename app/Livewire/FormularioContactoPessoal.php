<?php

namespace App\Livewire;

use App\Models\PersonalContact;
use App\Models\TypeContact;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioContactoPessoal extends Component
{
    use WithFileUploads;

    public $type_contact, $contact;

    public $employee;

    public  function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $type_contacts = TypeContact::get();

        return view('livewire.employee.formulario-contacto-pessoal')->with([
            "type_contacts" => $type_contacts
        ]);
    }

    public function createContact($employee)
    {
        $this->validate([
            'type_contact' => 'required',
            'contact' => 'required|min:7',
        ]);

        
        try {
            PersonalContact::create([
                'type_contact_id' => $this->type_contact,
                'contact' => $this->contact,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#contactPerson", //id do modal
                "title" => "Contacto Pessoal!",
                "icon" => "success",
                "text" => "Um contacto pessoal foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
