<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;

    private $searchCustomer;

    public function render()
    {
        if ($this->searchCustomer):
            $customers = Customer::orWhere("name", "LIKE", "%{$this->searchCustomer}%")
                ->orWhere("nuit", "LIKE", "%{$this->searchCustomer}%")
                ->orWhere("phone", "LIKE", "%{$this->searchCustomer}%")
                ->paginate(5);
        else:
            $customers = Customer::paginate(4);
        endif;

        return view('livewire.customers.customers')->with(["customers" => $customers]);
    }

    public function search($value)
    {
        $this->searchCustomer = trim($value);
    }
}
