<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
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

        DB::table('payment_methods')->insert($payments);
    }
}
