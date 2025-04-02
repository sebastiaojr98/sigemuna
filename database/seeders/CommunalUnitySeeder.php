<?php

namespace Database\Seeders;

use App\Models\CommunalUnity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommunalUnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 25; $i++) { 
            CommunalUnity::create([
                'label' => "Unidade Comunal de Teste",
                'neighborhood_id' => $i+1
            ]);
        }
    }
}
