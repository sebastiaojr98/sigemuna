<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $revenues = [
            [
                'id' => 1,
                'label' => 'Aluguel de Ativos',
                'description' => 'Aluguel de Ativos',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'Prestação de Serviços',
                'description' => 'Prestação de Serviços',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'label' => 'Emissão de Licenças',
                'description' => 'Emissão de Licenças',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('type_revenues')->insert($revenues);
    }
}
