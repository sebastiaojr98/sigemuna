<?php

namespace App\Livewire;

use App\Models\AdministrativePost;
use Exception;
use Livewire\Component;

class FormularioPostoAdministrativo extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.administrativePosts.formulario-posto-administrativo');
    }

    public function createAdministrativePost()
    {
        $this->validate([
            "name" => "required"
        ]);

        try {
            AdministrativePost::create([
                "label" => $this->name
            ]);
            $this->name = "";
            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Posto Administrativo",
                "icon" => "success",
                "text" => "Um Posto Administrativo foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
