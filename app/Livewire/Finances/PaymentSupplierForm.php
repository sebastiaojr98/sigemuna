<?php

namespace App\Livewire\Finances;

use App\Models\AccountPayable;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\PaymentMethod;
use App\Models\SupplierPayment;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportEvents\Event;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class PaymentSupplierForm extends Component
{
    use WithFileUploads;


    public AccountPayable $accountPayable;

    public string $supplier;

    public string $amountPaid = '';
    public string $paymentDate = '';
    public string $paymentMethod = '';
    public string $reference = '';
    public string $invoiceNumber = '';
    public $file = '';

    public function render()
    {
        $paymentMethods = PaymentMethod::all(['id', 'label']);
        return view('livewire.finances.payment-supplier-form')->with(["paymentMethods" => $paymentMethods]);
    }



    #[On('setAccountPayable')]
    public function setAccountPayable(AccountPayable $accountPayable)
    {
        $this->accountPayable = $accountPayable;
        $this->supplier = $this->accountPayable->supplier->name;
        $this->amountPaid = ($this->accountPayable->amount_due - $this->accountPayable->amount_paid);
    }


    public function confirmPay(): Event|\Exception
    {
        $data = $this->accountPayable;

        $this->validate([
            'amountPaid' => ['required', function($field, $value, $callback) use ($data) {
                if((doubleval($value) > (doubleval($data->amount_due) - doubleval($data->amount_paid)))):
                    $callback("amountPaid", "O valor a pagar não pode ser superior a ". (doubleval($data->amount_due) - doubleval($data->amount_paid)));
                endif;

                if(doubleval($value) <= 0):
                    $callback("amountPaid", "O valor não deve ser inferior e nem 0.");
                endif;
            }],
            'paymentDate' => 'required|date',
            'paymentMethod' => 'required|exists:payment_methods,id',
            'reference' => 'required|string|max:255',
            'invoiceNumber' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        DB::beginTransaction();

        try {
            if($this->file):
                $file_path = $this->file->store('suppliers/payment-documents');
            endif;

            $sp = SupplierPayment::create([
                'account_payable_id' => $this->accountPayable->id,
                'amount_paid' => $this->amountPaid,
                'payment_date' => $this->paymentDate,
                'payment_method_id' => $this->paymentMethod,
                'reference' => $this->reference,
                'invoice_number' => $this->invoiceNumber,
                'file_path' => $this->file ? $file_path : NULL,
                'user_create_id' => auth()->user()->id
            ]);

            $this->accountPayable->amount_paid += doubleval($sp->amount_paid);

            if(($this->accountPayable->amount_due == $this->accountPayable->amount_paid) && ($this->accountPayable->status != "Pago")):
                $this->accountPayable->status = "Pago";
            endif;

            if(($this->accountPayable->amount_due != $this->accountPayable->amount_paid) && $this->accountPayable->status != "Parcial"):
                $this->accountPayable->status = "Parcial";
            endif;

            $this->accountPayable->save();

            DB::commit();

            $this->dispatch('updateComponent')->to(AccountsPayable::class);

            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Sucesso",
                "icon" => "success",
                "text" => "Pagamento referente a factura número: ". $sp->invoice_number. " foi processado com sucesso."
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Falha",
                "icon" => "error",
                "text" => "Pagamento referente a factura número: ". $sp->invoice_number. " falhou, tenta novamente mais tarde."
            ]);
        }
    }
}
