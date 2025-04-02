<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'id' => 1,
                'name' => "Desobstrução de Ramais",
                'created_at' => "2023-11-22 12:03:20",
                'updated_at' => "2023-11-22 12:03:20"
            ],
        ];

        DB::table('services')->insert($services);
    }
}
