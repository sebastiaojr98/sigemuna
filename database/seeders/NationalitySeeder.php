<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nationalities = [
            [
                'id' => 1,
                'label' => 'MZN',
                'description' => 'Moçambicano/a',
                'country' => 'Moçambique',
                'created_at' => null,
                'updated_at' => null
            ]
        ];

        DB::table('nationalities')->insert($nationalities);
    }
}
