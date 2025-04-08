<?php
    namespace App\Services\Finance;

use App\Models\ServiceContracted;

    class ServiceContractedService {

        public static function create(string $customerID, string $serviceID): ServiceContracted|\Exception
        {
            try {
                return ServiceContracted::create([
                    'customer_id' => $customerID,
                    'service_id' => $serviceID,
                    'user_create_id' => auth()->user()->id
                ]);
            } catch (\Exception $e) {
                return throw new \Exception($e->getMessage());
            }
        }

    }