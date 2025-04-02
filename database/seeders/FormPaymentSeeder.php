<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'id' => 1,
                'label' => 'Deposito',
                'description' => '',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'Transferência Bancaria',
                'description' => '',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('form_payments')->insert($payments);
    }
}
