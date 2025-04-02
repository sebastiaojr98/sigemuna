<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountType::insert([
            [
                'id' => 1,
                'label' => 'PF',
                'description' => 'Pessoa Física',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'label' => 'PJ',
                'description' => 'Pessoa Jurídica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
