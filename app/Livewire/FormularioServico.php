<?php

namespace App\Livewire;

use App\Models\Service;
use Exception;
use Livewire\Component;

class FormularioServico extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.services.formulario-servico');
    }

    public function createService()
    {
        $this->validate([
            "name" => "required"
        ]);

        try {
            Service::create([
                "name" => $this->name
            ]);
            
            $this->name = "";
            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Serviço",
                "icon" => "success",
                "text" => "Um Serviço foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
