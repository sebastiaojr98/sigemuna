<?php

namespace App\Livewire;

use App\Models\Infrastructure;
use App\Models\InfrastructureType;
use App\Models\Neighborhood;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioInfraestrutura extends Component
{
    use WithFileUploads;

    public $type_infrastructure, $neighborhood, $year, $image, $description;

    public function render()
    {
        $neighborhoods = Neighborhood::get();
        $type_infrastructures = InfrastructureType::get();

        return view('livewire.infrastructures.formulario-infraestrutura')->with([
            "neighborhoods" => $neighborhoods,
            "type_infrastructures" => $type_infrastructures
        ]);

    }

    public function createInfra()
    {
        $this->validate([
            "type_infrastructure" => 'required',
            "neighborhood" => "required",
            "year" => "required",
            "image" => "required|file|mimes:jpg,jpeg,png",
            "description" => "required"
        ]);

        try {

            $file = $this->image->store("images_infras");

            Infrastructure::create([
                'year' => '2023',
                'code' => 'INF-'. $this->year . '-' . $this->reference(),
                'status' => '1',
                'image' => $file,
                'infrastructure_type_id' => $this->type_infrastructure,
                'neighborhood_id' => $this->neighborhood,
                'description' => $this->description,
                "user_id" => auth()->user()->id
            ]);

            $this->clearForm();
            
            return $this->dispatch("cadastrado", [
                "modal" => "#createInfra", //id do modal
                "title" => "Infraestrutura!",
                "icon" => "success",
                "text" => "Uma Infraestrutura foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    //Gerador de codigos
    private function reference(){
        return rand(10000, 99999);
    }

    private function clearForm()
    {
        $this->type_infrastructure = "";
        $this->neighborhood = "";
        $this->year = "";
        $this->image = " ";
        $this->description = "";
    }
}
