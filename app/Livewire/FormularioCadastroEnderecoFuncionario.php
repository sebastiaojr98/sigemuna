<?php

namespace App\Livewire;

use App\Models\AdministrativePost;
use App\Models\CommunalUnity;
use App\Models\EmployeeAddress;
use App\Models\Neighborhood;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioCadastroEnderecoFuncionario extends Component
{
    use WithFileUploads;

    public $administrative_posts = [], $neighborhoods = [], $communal_units = [];

    public $administrative_post, $neighborhood, $communal_unity, $house_number, $block_number, $document;

    public $employee;

    public function mount($employee)
    {
        
        $this->employee = $employee;
    }

    public function render()
    {
        $this->administrative_posts = AdministrativePost::get();

        return view('livewire.employee.formulario-cadastro-endereco-funcionario');
    }

    public function setNeighborhoods()
    {
        return $this->neighborhoods = Neighborhood::where("administrative_post_id", "=", $this->administrative_post)->get();
    }

    public function setcommunalUnits()
    {
        return $this->communal_units = CommunalUnity::where("neighborhood_id", "=", $this->neighborhood)->get();
    }

    public function createAddress($employee)
    {
        $this->validate([
            'administrative_post' => 'required',
            'neighborhood' => 'required',
            'communal_unity' => 'nullable|required',
            'house_number' => 'nullable|integer',
            'block_number' => 'nullable|integer',
            'document' => 'nullable|file|mimes:pdf'
        ]);

        
        try {
            $file = $this->document ? $this->document->store("employees_residence_documents") : null;
            
            EmployeeAddress::create([
                'administrative_post_id' => $this->administrative_post,
                'neighborhood_id' => $this->neighborhood,
                'communal_unity_id' => $this->communal_unity,
                'house_number' => $this->house_number,
                'block_number' => $this->block_number,
                'document' => $file,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);

            return $this->dispatch("cadastrado", [
                "modal" => "#residencia", //id do modal
                "title" => "Endereço!",
                "icon" => "success",
                "text" => "O endereço foi cadastrado com sucesso",
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
