<?php

namespace App\Livewire\Finances;

use App\Models\AccountPayable;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AccountsPayable extends Component
{
    public function render(): View
    {
        $filters = [
            "Nome do cliente",
            "Factura",
            "Estado"
        ];

        $accountsPayable = AccountPayable::paginate(3);
        return view('livewire.finances.accounts-payable')->with([
            'filters' => $filters,
            'accountsPayable' => $accountsPayable
        ]);
    }
}
