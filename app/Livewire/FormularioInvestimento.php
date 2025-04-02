<?php

namespace App\Livewire;

use App\Models\Investment;
use App\Models\Investor;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioInvestimento extends Component
{
    use WithFileUploads;

    public $process_number, $investor, $amount, $start_date, $end_date, $rate, $document, $description;

    public function render()
    {
        $investors = Investor::get();
        return view('livewire.investors.formulario-investimento')->with(["investors" => $investors]);
    }

    public function createInvestment()
    {
        $this->validate([
            'process_number' => 'required',
            'investor' => 'required',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'rate' => 'required',
            'document' => 'required|file|mimes:pdf',
            'description' => "required",
        ]);

        try {
            $file = $this->document ? $this->document->store("investments_documents") : null;

            $investment = Investment::create([
                'process_number' => $this->process_number,
                'investor_id' => $this->investor,
                'amount' => $this->amount,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'return_rate' => $this->rate,
                'status' => '1',
                'description' => $this->description,
                'document' => $file,
                'user_id' => auth()->user()->id,
            ]);
            $this->dispatch("cadastrado", [
                "modal" => "#createEmployee", //id do modal
                "title" => "Licença!",
                "icon" => "success",
                "text" => "Um investimento de {$investment->amount} MT foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
           dd($e->getMessage());
        }
    }
}
