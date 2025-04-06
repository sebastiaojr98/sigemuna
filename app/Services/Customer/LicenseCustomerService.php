<?php
    namespace App\Services\Customer;

use App\Models\License;

    class LicenseCustomerService{

        public static function transport(string $serviceContractedID, string $customerID, string $carBrand, string $carModel, string $carRegistration): License|\Exception
        {
            try{
                return License::create([
                    'code' => 'LIC-'.date('Y/m/').self::getCode(),
                    'service_contracted_id' => $serviceContractedID,
                    'customer_id' => $customerID,
                    'car_brand' => $carBrand,
                    'car_model' => $carModel,
                    'car_registration' => $carRegistration,
                ]);
            }catch(\Exception $e){
                return throw new \Exception($e->getMessage());
            }
        }


        public static function supply(string $serviceContractedID, string $customerID, string $houseNumber, string $block, string $communalUnitID): License|\Exception
        {
            try{
                return License::create([
                    'code' => 'LIC-'.date('Y/m/').self::getCode(),
                    'service_contracted_id' => $serviceContractedID,
                    'customer_id' => $customerID,
                    'house_number' => $houseNumber,
                    'block' => $block,
                    'communal_unit_id' => $communalUnitID,
                ]);
            }catch(\Exception $e){
                return throw new \Exception($e->getMessage());
            }
        }
        
        private static function getCode(): string
        {
            return mt_rand(1000000, 9999999);
        }
    }