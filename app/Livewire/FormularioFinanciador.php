<?php

namespace App\Livewire;

use App\Models\Financier;
use App\Models\FinancierType;
use Exception;
use Livewire\Component;

class FormularioFinanciador extends Component
{
    public $process_code, $financier_type, $name, $country, $city, $address, $phone, $site, $email;

    public function render()
    {
        $financier_types = FinancierType::get();
        return view('livewire.funders.formulario-financiador')->with(["financier_types" => $financier_types]);
    }

    public function createFinancier()
    {
        $this->validate([
            "process_code" => "required",
            "financier_type" => "required",
            "name" => "required|min:6",
            "country" => "required",
            "city" => "required",
            "address" => "required",
            "phone" => "required",
            "site" => "nullable",
            "email" => "nullable|email"
        ]);

        try {
            Financier::create([
                'process_code' => $this->process_code,
                'financier_type_id' => $this->financier_type,
                'name' => $this->name,
                'address' => $this->address,
                'city' => $this->city,
                'country' => $this->country,
                'phone' => $this->phone,
                'email' => $this->email,
                'site' => $this->site,
                'user_id' => auth()->user()->id,
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#createEmployee", //id do modal
                "title" => "Financiador!",
                "icon" => "success",
                "text" => "Um Financiador foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
