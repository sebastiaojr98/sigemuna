<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create([
            'id' => 1,
            'label' => 'Cabo Delgado',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 2,
            'label' => 'Gaza',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 3,
            'label' => 'Inhambane',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 4,
            'label' => 'Manica',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 5,
            'label' => 'Maputo',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 6,
            'label' => 'Nampula',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 7,
            'label' => 'Niassa',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 8,
            'label' => 'Sofala',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 9,
            'label' => 'Tete',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 10,
            'label' => 'Zambezia',
            'nationality_id' => 1,
        ]);

        Province::create([
            'id' => 11,
            'label' => 'Cidade de Maputo',
            'nationality_id' => 1,
        ]);
    }
}
