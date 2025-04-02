<?php

namespace App\Livewire;

use App\Models\CommunalUnity;
use App\Models\Neighborhood;
use Exception;
use Livewire\Component;

class FormularioUnidadeComunal extends Component
{
    public $name, $neighborhood;

    public function render()
    {
        $neighborhoods = Neighborhood::get();
        return view('livewire.communalUnits.formulario-unidade-comunal')->with(["neighborhoods" => $neighborhoods]);
    }

    public function createNeighborhood()
    {
        $this->validate([
            "name" => "required",
            "neighborhood" => "required"
        ]);

        try {
            CommunalUnity::create([
                "label" => $this->name,
                "neighborhood_id" => $this->neighborhood
            ]);
            $this->name = "";
            $this->neighborhood = "";
            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Unidade Comunal",
                "icon" => "success",
                "text" => "Uma Unidade Comunal foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
