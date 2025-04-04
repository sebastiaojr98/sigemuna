<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;


    public function render()
    {
        $customers = Customer::paginate(5); 
        return view('livewire.customers.customers')->with(["customers" => $customers]);
    }
}
