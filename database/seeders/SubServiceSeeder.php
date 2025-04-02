<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subServices = [
            [
                'id' => 1,
                'label' => 'Singular',
                'amount' => 1500.0,
                'service_id' => 1,
                'created_at' => '2023-11-22 12:03:37',
                'updated_at' => '2023-11-22 12:03:37'
            ],
            [
                'id' => 2,
                'label' => 'Coletivos',
                'amount' => 3500.0,
                'service_id' => 1,
                'created_at' => '2023-11-22 12:03:50',
                'updated_at' => '2023-11-22 12:03:50'
            ],
            [
                'id' => 3,
                'label' => 'Empresarial',
                'amount' => 7350.0,
                'service_id' => 1,
                'created_at' => '2023-11-22 12:04:04',
                'updated_at' => '2023-11-22 12:04:04'
            ],
        ];

        DB::table('sub_services')->insert($subServices);
    }
}
