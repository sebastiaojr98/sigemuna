<?php

namespace Database\Seeders;

use App\Models\FinancierType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinancierTypeSeeder extends Seeder
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
                'description' => 'Pessoa Física'
            ],
            [
                'id' => 2,
                'label' => 'Pessoa Jurídica',
                'description' => 'Pessoa Jurídica'
            ],
            [
                'id' => 3,
                'label' => 'Organização sem fins lucrativos',
                'description' => 'Organização sem fins lucrativos'
            ],
            [
                'id' => 4,
                'label' => 'Instituição Financeira',
                'description' => 'Instituição Financeira'
            ],
        ];

        foreach ($types as $type) {
            FinancierType::updateOrCreate(
                ['id' => $type['id']],
                $type
            );
        }
    }
}
