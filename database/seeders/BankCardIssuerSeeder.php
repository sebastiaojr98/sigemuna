<?php

namespace Database\Seeders;

use App\Models\BankCardIssuer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankCardIssuerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankCardIssuer::insert([
            [
                'id' => 1,
                'label' => 'MB',
                'description' => 'Millennium Bim',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'label' => 'SB',
                'description' => 'Standard Bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'label' => 'BCI',
                'description' => 'Banco Comercial e de Investimentos (BCI)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'label' => 'BU',
                'description' => 'Banco Único',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'label' => 'BMoza',
                'description' => 'Banco Moza',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
