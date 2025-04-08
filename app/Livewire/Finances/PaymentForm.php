<?php

namespace App\Livewire\Finances;

use Livewire\Component;
use App\Models\PaymentMethod;
use App\Models\Receipt;
use App\Support\SMS;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportEvents\Event;
use Livewire\WithFileUploads;

class PaymentForm extends Component
{
    use WithFileUploads;

    
    public $invoiceNumber = '';
    public $paymentMethod = '';
    public $amountPaid = '';
    public $file = '';
    public $paymentDate = '';

    public array $accountReceivable = [];

    protected $listeners = ['set-account-receivabale' => 'setAccountReceivable'];

    
    public function render()
    {
        $paymentMethods = PaymentMethod::all(['id', 'label']);
        return view('livewire.finances.payment-form')->with(["paymentMethods" => $paymentMethods]);
    }

    public function pay(): Event
    {
        $data = $this->accountReceivable;

        $this->validate([
            'paymentMethod' => 'required|exists:payment_methods,id',
            'file' => 'file|mimes:jpg,jpeg,png,pdf|max:5120',
            'paymentDate' => 'required|date',
            'amountPaid' => ['required', function($field, $value, $callback) use ($data) {
                
                if((doubleval($value) > (doubleval($data['amount_due']) - doubleval($data['amount_paid'])))):
                    $callback("amountPaid", "O valor a pagar não pode ser superior a ". (doubleval($data['amount_due']) - doubleval($data['amount_paid'])));
                endif;

                if(doubleval($value) <= 0):
                    $callback("amountPaid", "O valor não deve ser inferior a 0.");
                endif;
            }]
        ]);
        
        //pagar

        DB::beginTransaction();
        
        try {

            if($this->file):
                $file_path = $this->file->store('customers/receipts');
            endif;

            $re = Receipt::create([
                'invoice_id' => $data['invoice_id'],
                'account_receivable_id' => $data['id'],
                'amount_paid' => $this->amountPaid,
                'payment_method_id' => $this->paymentMethod,
                'payment_date' => $this->paymentDate,
                'file_path' => $this->file ? $file_path : NULL,
                'user_create_id' => auth()->user()->id
                /*'description' => 'Este recibo comprova o pagamento da taxa de(o) '*/
            ]);

            $re->accountReceivable->amount_paid += doubleval($re->amount_paid);

            if(($re->accountReceivable->amount_due == $re->accountReceivable->amount_paid) && ($re->accountReceivable->status != "Pago")):
                $re->accountReceivable->status = "Pago";
            endif;

            if(($re->accountReceivable->amount_due != $re->accountReceivable->amount_paid) && $re->accountReceivable->status != "Parcialmente Pago"):
                $re->accountReceivable->status = "Parcialmente Pago";
            endif;

            $re->accountReceivable->save();

            //Ativando o servićo
            if($re->invoice->serviceContracted->status == "Pendente"):
                $re->invoice->serviceContracted->status = "Activo";
                $re->invoice->serviceContracted->start_date = now();
                $re->invoice->serviceContracted->save();
            endif;

            

            if($re->invoice->type === "Licença"):
                if (($re->invoice->serviceContracted->license->status === "Pendente") || ($re->invoice->serviceContracted->license->status === "Expirada")) {
                    $re->invoice->serviceContracted->license->issue_date = now();
                    $re->invoice->serviceContracted->license->due_date = now()->addYear(1);
                    $re->invoice->serviceContracted->license->status = "Emitida";
                    $re->invoice->serviceContracted->license->save();
                }
            endif;

            DB::commit();

            $this->dispatch('updateComponent')->to(AccountsReceivable::class);

            SMS::send($re->invoice->customer->phone, "Factura N. ". $re->invoice->number. " paga no valor de ".formatAmount($re->amount_paid)." MT. Obrigado!");

            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Sucesso",
                "icon" => "success",
                "text" => "Pagamento referente a factura número: ". $data['invoice_number']. " foi processado com sucesso."
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->dispatch("pagamento", [
                "modal" => "#makePayment",
                "title" => "Falha",
                "icon" => "error",
                "text" => "Pagamento referente a factura número: ". $data['invoice_number']. " falhou, tenta novamente mais tarde."
            ]);
        }

    }

    public function setAccountReceivable($account)
    {
        $this->accountReceivable = $account;
        $this->invoiceNumber = $this->accountReceivable['invoice_number'];
        $this->amountPaid = doubleval(($this->accountReceivable['amount_due'] - $this->accountReceivable['amount_paid']));

    }
}
