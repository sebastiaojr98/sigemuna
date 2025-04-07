<?php

namespace App\Livewire\Finances;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class Invoices extends Component
{
    use WithPagination;

    public function render()
    {
        $invoices = Invoice::with(['serviceContracted', 'customer'])
            ->paginate(3);
        $invoiceTotal = Invoice::count();
        return view('livewire.finances.invoices')->with([
            "invoices" => $invoices,
            "invoiceTotal" => $invoiceTotal
        ]);
    }

    public function print(Invoice $invoice)
    {
        
    }
}
