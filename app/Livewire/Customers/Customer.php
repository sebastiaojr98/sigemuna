<?php

namespace App\Livewire\Customers;

use App\Models\Customer as ModelsCustomer;
use App\Models\ServiceContracted;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;
    public $customer;

    public function mount(ModelsCustomer $customer)
    {
        $this->customer = $customer;
    }

    #[On('updateComponent')]
    public function render()
    {

        $contractedServices = ServiceContracted::orderBy('created_at', 'desc')
            ->where('customer_id', $this->customer->id)
            ->paginate(4);

        return view('livewire.customers.customer')->with(["customer" => $this->customer, "contractedServices" => $contractedServices]);
    }

    public function disableService(ServiceContracted $service): void
    {
        $service->status = "Cancelado";
        $service->save();
    }
}
