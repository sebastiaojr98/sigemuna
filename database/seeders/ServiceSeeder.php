<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceCategories = ServiceCategory::all();

        foreach ($serviceCategories as $serviceCategorie) {
            //servicos de emissao de licensas
            if ($serviceCategorie->code === "00001") {
                Service::create([
                    'code' => "SE-00001",
                    'name' => "Licença de abastecimento de água potável provedor (Residencial)",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de abastecimento de água potável (Residencial)",
                    'base_price' => 2500,
                    'billing_type' => "Anual",
                ]);
                Service::create([
                    'code' => "SE-00002",
                    'name' => "Licença de abastecimento de água potável provedor (Industrial)",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de abastecimento de água potável provedor (Industrial)",
                    'base_price' => 7500,
                    'billing_type' => "Anual",
                ]);
            }

            if($serviceCategorie->code === "00002"){
                Service::create([
                    'code' => "SE-00003",
                    'name' => "Licença de transporte de água potável viaturas de ate 5m3",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de transporte de água potável viaturas de ate 5m3",
                    'base_price' => 3500,
                    'billing_type' => "Anual",
                ]);
                Service::create([
                    'code' => "SE-00004",
                    'name' => "Licença de transporte de água potável viaturas de ate 10m3",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de transporte de água potável viaturas de ate 10m3",
                    'base_price' => 5500,
                    'billing_type' => "Anual",
                ]);

                Service::create([
                    'code' => "SE-00006",
                    'name' => "Licença de transporte de água potável viaturas de ate 15m3",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de transporte de água potável viaturas de ate 15m3",
                    'base_price' => 10500,
                    'billing_type' => "Anual",
                ]);
                Service::create([
                    'code' => "SE-00007",
                    'name' => "Licença de transporte de água potável viaturas de ate 25m3",
                    'category_id' => $serviceCategorie->id,
                    'description' => "Licença de transporte de água potável viaturas de ate 25m3",
                    'base_price' => 12000,
                    'billing_type' => "Anual",
                ]);
            }
        }
    }
}
