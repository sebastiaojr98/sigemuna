<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InfrastructureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['label' => 'Sanitário Público'],
            ['label' => 'Furo de Água'],
            ['label' => 'Sistemas de Abastecimento de Água'],
            ['label' => 'Valas de Drenagem'],
            ['label' => 'Sarjetas'],
            ['label' => 'Esgotos'],
            ['label' => 'Aterros'],
            ['label' => 'Estações de Tratamento de Águas Residuais'],
            ['label' => 'Estações de Tratamento de Lamas Fecais'],
            ['label' => 'Fossas Sépticas'],
            ['label' => 'Latrinas Melhoradas'],
            ['label' => 'Latrinas Tradicionais'],
            ['label' => 'Passagens Hidráulicas'],
            ['label' => 'Caixas de Visitas Públicas'],
            ['label' => 'Emissários'],
        ];

        DB::table('infrastructure_types')->insert($types);
    }
}
