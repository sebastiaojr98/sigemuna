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
            ['id' => 1, 'label' => 'Sanitario Publico', 'created_at' => '2023-03-09 00:18:50', 'updated_at' => '2023-03-09 00:18:50'],
            ['id' => 2, 'label' => 'Furo de Aguá', 'created_at' => '2023-03-09 00:18:50', 'updated_at' => '2023-03-09 00:18:50'],
            ['id' => 3, 'label' => 'Sistemas de Abastecimento de Agua', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'label' => 'Valas de Drenagem', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'label' => 'Sargetas', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'label' => 'Esgotos', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'label' => 'Ateros', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'label' => 'Estacoes de Tratamento de Aguas Residuais', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'label' => 'Estacoes de Tratamento de Lamas Fecais', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'label' => 'Fossas Septicas', 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'label' => 'Latrinas Melhoradas', 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'label' => 'Latrinas Tradicionais', 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'label' => 'Passagens Hidraulicas', 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'label' => 'Caixas de Visitas Publicas', 'created_at' => null, 'updated_at' => null],
            ['id' => 15, 'label' => 'Emissarios', 'created_at' => null, 'updated_at' => null],
        ];

        DB::table('infrastructure_types')->insert($types);
    }
}
