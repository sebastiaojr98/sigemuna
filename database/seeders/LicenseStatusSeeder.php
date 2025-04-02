<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LicenseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'id' => 1,
                'label' => 'AV',
                'description' => 'Ativa',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'PT',
                'description' => 'Pendente',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'label' => 'VD',
                'description' => 'Vencida',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 4,
                'label' => 'SS',
                'description' => 'Suspensa',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('license_statuses')->insert($statuses);
    }
}
