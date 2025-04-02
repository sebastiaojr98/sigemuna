<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\SubService;
use Exception;
use Livewire\Component;

class FormularioSubServico extends Component
{
    public $service, $sub_service, $amount;

    public function render()
    {
        $services = Service::get();
        return view('livewire.subService.formulario-sub-servico')->with(["services" => $services]);
    }

    public function createSubService()
    {
        $this->validate([
            "service" => "required",
            "sub_service" => "required",
            'amount' => 'required|numeric|min:0'
        ]);

        try {
            SubService::create([
                "label" => $this->sub_service,
                "amount" => $this->amount,
                "service_id" => $this->service
            ]);

            $this->service = "";
            $this->sub_service = "";
            $this->amount = "";
            return $this->dispatch("cadastrado", [
                "modal" => "#administrativePosts", //id do modal
                "title" => "Forma de Prestação",
                "icon" => "success",
                "text" => "Uma 	Forma de Prestação foi cadastrada com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
