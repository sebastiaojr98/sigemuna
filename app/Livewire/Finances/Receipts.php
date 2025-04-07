<?php

namespace App\Livewire\Finances;

use App\Models\Receipt;
use App\Services\Pdf\DomPdfService;
use Livewire\Component;
use Livewire\WithPagination;

class Receipts extends Component
{
    use WithPagination;

    public function render()
    {
        $receipts = Receipt::with(['invoice', 'paymentMethod', 'userCreated'])
            ->paginate(3);
        $receiptTotal = Receipt::count();

        return view('livewire.finances.receipts')->with([
            "receipts" => $receipts,
            "receiptTotal" => $receiptTotal
        ]);
    }

    public function print(Receipt $receipt)
    {
        try {
            $data = view('relatories.receipt', ["receipt" => $receipt])->render();
            return DomPdfService::make($data, "receipts/files");
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
