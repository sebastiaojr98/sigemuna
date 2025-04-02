<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            [
                'id' => 1,
                'label' => 'M',
                'description' => 'Masculino',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'label' => 'F',
                'description' => 'Femenino',
                'created_at' => null,
                'updated_at' => null
            ],
        ];

        DB::table('genders')->insert($genders);
    }
}
