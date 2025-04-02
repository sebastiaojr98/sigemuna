<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'id' => 1,
                'label' => 'S',
                'description' => 'Solteiro',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'UF',
                'description' => 'União de Facto',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'label' => 'C',
                'description' => 'Casado',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('marital_statuses')->insert($statuses);
    }
}
