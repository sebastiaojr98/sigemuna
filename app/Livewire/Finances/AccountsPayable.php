<?php

namespace App\Livewire\Finances;

use App\Models\AccountPayable;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class AccountsPayable extends Component
{
    #[On('updateComponent')]
    public function render(): View
    {
        $filters = [
            "Nome do cliente",
            "Factura",
            "Estado"
        ];

        $accountsPayable = AccountPayable::with(['expense', 'supplier'])
            ->orderBy('status', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('livewire.finances.accounts-payable')->with([
            'filters' => $filters,
            'accountsPayable' => $accountsPayable
        ]);
    }


    public function selectAccountPayable($accountPayable): void
    {
        $this->dispatch('setAccountPayable', $accountPayable)->to(PaymentSupplierForm::class);
    }
}
