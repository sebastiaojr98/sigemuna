<?php

namespace Database\Seeders;

use App\Models\DegreeOfKinship;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DegreeOfKinshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DegreeOfKinship::insert([
            ['id' => 1, 'label' => 'Filho/a'],
            ['id' => 2, 'label' => 'Enteado/a'],
            ['id' => 3, 'label' => 'Sobrinho/a'],
            ['id' => 4, 'label' => 'Empregado/a'],
            ['id' => 5, 'label' => 'Cunhado/a'],
            ['id' => 6, 'label' => 'Primo/a'],
            ['id' => 7, 'label' => 'Esposa'],
            ['id' => 8, 'label' => 'Esposo'],
        ]);
    }
}
