<?php

namespace App\Livewire;

use App\Models\License;
use App\Models\LicenseType;
use Exception;
use Livewire\Component;

class FormularioCadastrarLicenca extends Component
{
    public $type_license, $especification, $amount;

    public function render()
    {
        $type_licenses = LicenseType::get();
        return view('livewire.licenses.formulario-cadastrar-licenca')->with(["type_licenses" => $type_licenses]);
    }

    public function createNewLicense()
    {
        $this->validate([
            "type_license" => "required",
            "especification" => "required",
            'amount' => 'required|numeric|min:0'
        ]);

        try {
            License::create([
                "name" => $this->especification,
                "license_type_id" => $this->type_license,
                "amount" => $this->amount
            ]);
            $this->type_license = "";
            $this->especification = "";
            $this->amount = "";

            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Licença",
                "icon" => "success",
                "text" => "Uma Licença foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
