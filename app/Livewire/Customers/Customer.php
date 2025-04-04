<?php

namespace App\Livewire\Customers;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    private $customer;

    public function mount(ModelsCustomer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        return view('livewire.customers.customer')->with(["customer" => $this->customer]);
    }
}
