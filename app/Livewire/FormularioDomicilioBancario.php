<?php

namespace App\Livewire;

use App\Models\BankCardIssuer;
use App\Models\BankingDomicile;
use Exception;
use Livewire\Component;

class FormularioDomicilioBancario extends Component
{
    public $bank_card_issue, $account_number, $nib, $card_number, $validity;

    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        $bank_card_issuers  = BankCardIssuer::get();
        return view('livewire.employee.formulario-domicilio-bancario')->with(["bank_card_issuers" => $bank_card_issuers]);
    }

    public function createBankingDomicile($employee)
    {
        $this->validate([
            'bank_card_issue' => 'required',
            'account_number' => 'required',
            'nib' => 'required',
            'card_number' => 'nullable',
            'validity' => 'nullable',
        ]);

        try {
            BankingDomicile::create([
                'bank_card_issue_id' => $this->bank_card_issue,
                'account_number' => $this->account_number,
                'nib' => $this->nib,
                'card_number' => $this->card_number,
                'validity' => $this->validity,
                'employee_id' => $employee,
                'user_create_id' => auth()->user()->id
            ]);
            return $this->dispatch("cadastrado", [
                "modal" => "#domicilioBancario", //id do modal
                "title" => "Domicilio Bancario",
                "icon" => "success",
                "text" => "O seu domicilio bancario foi cadastrado com sucesso."
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
