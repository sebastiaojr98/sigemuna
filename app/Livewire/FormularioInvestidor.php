<?php

namespace App\Livewire;

use App\Models\Investor;
use App\Models\TypeInvestor;
use Exception;
use Livewire\Component;

class FormularioInvestidor extends Component
{
    public $process_code, $investor_type, $name, $country, $city, $address, $phone, $site, $email;

    public function render()
    {
        $investor_types = TypeInvestor::get();
        return view('livewire.investors.formulario-investidor')->with(["investor_types" => $investor_types]);
    }

    public function createInvestor()
    {
        $this->validate([
            "process_code" => "required",
            "investor_type" => "required",
            "name" => "required|min:6",
            "country" => "required",
            "city" => "required",
            "address" => "required",
            "phone" => "required",
            "site" => "nullable",
            "email" => "nullable|email"
        ]);

        try {
            Investor::create([
                'process_code' => $this->process_code,
                'investor_type_id' => $this->investor_type,
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
                "title" => "Investidor!",
                "icon" => "success",
                "text" => "Um Investidor foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
