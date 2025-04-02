<?php

namespace App\Livewire;

use App\Models\Financier;
use App\Models\Financing;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioFinanciamento extends Component
{
    use WithFileUploads;

    public $process_number, $financier, $amount, $start_date, $end_date, $rate, $document, $description;

    public function render()
    {
        $financiers = Financier::get();
        return view('livewire.funders.formulario-financiamento')->with(["financiers" => $financiers]);
    }

    public function createFinancing()
    {
        $this->validate([
            'process_number' => 'required',
            'financier' => 'required',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'rate' => 'required',
            'document' => 'required|file|mimes:pdf',
            'description' => "required",
        ]);

        try {
            $file = $this->document ? $this->document->store("financings_documents") : null;

            $financie = Financing::create([
                'process_number' => $this->process_number,
                'financier_id' => $this->financier,
                'amount' => $this->amount,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'interest_rate' => $this->rate,
                'status' => '1',
                'description' => $this->description,
                'document' => $file,
                'user_id' => auth()->user()->id,
            ]);

            $this->dispatch("cadastrado", [
                "modal" => "#createEmployee", //id do modal
                "title" => "Licença!",
                "icon" => "success",
                "text" => "Um investimento de {$financie->amount} MT foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
           dd($e->getMessage());
        }
    }
}
