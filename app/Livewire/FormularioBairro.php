<?php

namespace App\Livewire;

use App\Models\AdministrativePost;
use App\Models\Neighborhood;
use Exception;
use Livewire\Component;

class FormularioBairro extends Component
{
    public $name, $administrative_post;
    
    public function render()
    {
        $administrative_posts = AdministrativePost::orderBy("label", "asc")->get();
        return view('livewire.neighborhoods.formulario-bairro')->with(["administrative_posts" => $administrative_posts]);
    }

    public function createNeighborhood()
    {
        $this->validate([
            "name" => "required",
            "administrative_post" => "required"
        ]);

        try {
            Neighborhood::create([
                "label" => $this->name,
                "administrative_post_id" => $this->administrative_post
            ]);
            $this->name = "";
            $this->administrative_post = "";
            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Bairro",
                "icon" => "success",
                "text" => "Um bairro foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
