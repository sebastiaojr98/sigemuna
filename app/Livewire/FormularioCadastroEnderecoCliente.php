<?php

namespace App\Livewire;

use App\Models\AdministrativePost;
use App\Models\ClientAddress;
use App\Models\CommunalUnity;
use App\Models\Neighborhood;
use Exception;
use Livewire\Component;

class FormularioCadastroEnderecoCliente extends Component
{
    public $administrative_posts = [], $neighborhoods = [], $communal_units = [];

    public $administrative_post, $neighborhood, $communal_unity, $house_number, $block_number, $description;

    public $client;

    public function mount($client)
    {
        
        $this->client = $client;
    }

    public function render()
    {
        $this->administrative_posts = AdministrativePost::get();
        return view('livewire.client.formulario-cadastro-endereco-cliente');
    }

    public function setNeighborhoods()
    {
        return $this->neighborhoods = Neighborhood::where("administrative_post_id", "=", $this->administrative_post)->get();
    }

    public function setcommunalUnits()
    {
        return $this->communal_units = CommunalUnity::where("neighborhood_id", "=", $this->neighborhood)->get();
    }

    public function createAddress($client)
    {
        $this->validate([
            'administrative_post' => 'required',
            'neighborhood' => 'required',
            'communal_unity' => 'nullable|required',
            'house_number' => 'nullable|integer',
            'block_number' => 'nullable|integer',
            'description' => 'nullable'
        ]);

        
        try {
            $address = ClientAddress::create([
                'administrative_post_id' => $this->administrative_post,
                'neighborhood_id' => $this->neighborhood,
                'communal_unity_id' => $this->communal_unity,
                'house_number' => $this->house_number,
                'block_number' => $this->block_number,
                'description' => $this->description ? $this->description : null,
                'client_id' => $client,
                'user_create_id' => auth()->user()->id
            ]);

            $this->dispatch("cadastrado", [
                "modal" => "#enderecos", //id do modal
                "title" => "Endereço!",
                "icon" => "success",
                "text" => "O endereço foi cadastrado com sucesso",
                "address" => $address
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
