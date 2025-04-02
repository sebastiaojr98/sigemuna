<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeInvestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id' => 1,
                'label' => 'Pessoa Física',
                'description' => 'Pessoa Física',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'Pessoa Jurídica',
                'description' => 'Pessoa Jurídica',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'label' => 'Investidor Anjo',
                'description' => 'Investidor Anjo',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 4,
                'label' => 'Instituição Financeira',
                'description' => 'Instituição Financeira',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 5,
                'label' => 'Fundos de Investimento',
                'description' => 'Fundos de Investimento',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('type_investors')->insert($types);
    }
}
