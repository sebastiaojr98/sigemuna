<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Suppliers extends Component
{
    use WithPagination;

    public function render()
    {
        $suppliers = Supplier::paginate(3);
        return view('livewire.suppliers.suppliers')
            ->with([
                "suppliers" => $suppliers
            ]);
    }


    public function disableSupplier(Supplier $supplier): void
    {
        if ($supplier->status == "Activo") {
            $supplier->status = "Inactivo";
        }else{
            $supplier->status = "Activo";
        };
        $supplier->save();
    }
}
