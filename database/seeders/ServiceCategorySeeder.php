<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::create([
            "code" => "00001",
            "name" => "Licença de abastecimento"
        ]);

        ServiceCategory::create([
            "code" => "00002",
            "name" => "Licença de transporte"
        ]);
    }
}
