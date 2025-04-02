<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id' => 1,
                'label' => 'Telemóvel',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'Telefone Fixo',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'label' => 'Fax',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 4,
                'label' => 'E-mail',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('type_contacts')->insert($types);
    }
}
