<?php
    namespace App\Services\Finance;

use App\Models\Invoice;

    class InvoiceService{

        public static function create(string $customerID, bool $isLicense, string $serviceContractedID, float $amount): Invoice|\Exception
        {
            try {
                return Invoice::create([
                    'customer_id' => $customerID,
                    'number' => "FT-".date("Y/m")."/".mt_rand(10000, 99999),
                    'type' => $isLicense ? "Licença" : "Serviço",
                    'service_contracted_id' => $serviceContractedID,
                    'total_amount' => $amount,
                    'due_date' => now()->addDay(30),
                ]);
            } catch (\Exception $e) {
                return throw new \Exception($e->getMessage());
            }
        }

    }