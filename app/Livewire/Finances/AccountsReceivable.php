<?php

namespace App\Livewire\Finances;

use App\Models\AccountReceivable;
use App\Models\Customer;
use App\Models\PaymentMethod;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class AccountsReceivable extends Component
{
    use WithPagination;

    public  array $accountReceivable;

    public string $filter = '';
    public string $filterValue = '';

    #[On('updateComponent')]
    public function render(): View
    {
        $filters = [
            "Nome do cliente",
            "Factura",
            "Estado"
        ];
        
        
        
        if(empty($this->filter) || empty($this->filterValue)):
            $accountsReceivable = AccountReceivable::orderBy('created_at', 'desc')->paginate(5);
        endif;

        if($this->filter == 'Factura'):
            $accountsReceivable = AccountReceivable::where('invoice_number', 'like', '%'.$this->filterValue.'%')->orderBy('created_at', 'desc')->paginate(5);
        endif;

        if($this->filter == 'Estado'):
            $accountsReceivable = AccountReceivable::where('status', 'like', '%'.$this->filterValue.'%')->orderBy('created_at', 'desc')->paginate(5);
        endif;

        if(($this->filter == "Nome do cliente") && !(empty($this->filterValue))):
            $customer = Customer::where('name', 'like', '%'.$this->filterValue.'%')->first();
            
            if($customer):
                $accountsReceivable = $customer->accountsReceivable()
                ->orderBy('created_at', 'desc')
                ->paginate(5);
            else:
                $accountsReceivable = [];
            endif;
        endif;
        


        $pending = AccountReceivable::where("status", "Pendente")->count();
        $toReceive = AccountReceivable::where("status", "!=", "Pago")
            ->selectRaw('SUM(amount_due - amount_paid) as total')
            ->first();
        $expired = AccountReceivable::where('status', '!=', 'Pago')
            ->where('due_date', '<', date('Y-m-d'))->count();

        return view('livewire.finances.accounts-receivable')->with([
            "accountsReceivable" => $accountsReceivable,
            "pending" => $pending,
            'toReceive' => $toReceive->total,
            'expired' => $expired,
            'filters' => $filters
        ]);
    }

    public function selectAccountReceivable($account): void
    {
        $this->accountReceivable = $account;

        $this->dispatch('set-account-receivabale', $account);
    }

    public function search(string $value): void
    {
        $this->filterValue = $value;
    }

}
