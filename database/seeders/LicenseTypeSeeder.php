<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id' => 1,
                'label' => 'LA',
                'description' => 'Abastecimento de Aguá Potável',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'LT',
                'description' => 'Transporte de Aguá Potável',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('license_types')->insert($types);
    }
}
