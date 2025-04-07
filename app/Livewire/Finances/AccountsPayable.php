<?php

namespace App\Livewire\Finances;

use App\Models\AccountPayable;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AccountsPayable extends Component
{
    use WithPagination;

    public string $filter = '';
    public string $filterValue = '';

    #[On('updateComponent')]
    public function render(): View
    {
        $filters = [
            "Nome do Fornecedor",
            "Estado"
        ];

        if(empty($this->filter) || empty($this->filterValue)):
            $accountsPayable = AccountPayable::with(['expense', 'supplier'])
                ->orderBy('status', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        endif;

        if($this->filter == 'Estado'):
            $accountsPayable = AccountPayable::where('status', 'like', '%'.$this->filterValue.'%')
                ->orderBy('status', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        endif;

        if(($this->filter == "Nome do Fornecedor") && !(empty($this->filterValue))):
            $supplier = Supplier::where('name', 'like', '%'.$this->filterValue.'%')->first();
            
            if($supplier):
                $accountsPayable = $supplier->accountsPayable()
                ->orderBy('status', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
            else:
                $accountsPayable = new LengthAwarePaginator([], 0, 3, null, []);
            endif;
        endif;

        //dd($accountsPayable);
        $relatories = AccountPayable::selectRaw(
            'COUNT(CASE WHEN status = "Pendente" THEN 1 END) as pending,
            SUM(CASE WHEN status != "Pago" THEN amount_due - amount_paid ELSE 0 END) as to_pay,
            COUNT(CASE WHEN status != "Pago" AND due_date < ? THEN 1 END) as expired',
            [date('Y-m-d')]
        )->first();

        return view('livewire.finances.accounts-payable')->with([
            'filters' => $filters,
            'accountsPayable' => $accountsPayable,
            'relatories' => $relatories
        ]);
    }


    public function selectAccountPayable($accountPayable): void
    {
        $this->dispatch('setAccountPayable', $accountPayable)->to(PaymentSupplierForm::class);
    }

    public function search(string $value): void
    {
        $this->filterValue = $value;
    }
}
