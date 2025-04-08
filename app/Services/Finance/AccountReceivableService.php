<?php
    namespace App\Services\Finance;

use App\Models\AccountReceivable as ModelsAccountReceivable;

    class AccountReceivableService{
        
        public static function create(string $invoiceID, string $customerID, string $invoiceNumber, float $amountDue, string $dueDate): ModelsAccountReceivable|\Exception

        {
            try {
                return ModelsAccountReceivable::create([
                    'invoice_id' => $invoiceID,
                    'customer_id' => $customerID,
                    'invoice_number' => $invoiceNumber,
                    'amount_due' => $amountDue,
                    'due_date' => $dueDate
                ]);
            } catch (\Exception $e) {
                return throw new \Exception($e->getMessage());
            }
        }

    }