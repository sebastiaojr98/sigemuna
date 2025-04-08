<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['label' => 'Auxiliar', 'department_id' => 1],
            ['label' => 'Auxiliar Administrativo', 'department_id' => 1],
            ['label' => 'Assistente Técnico', 'department_id' => 1],
            ['label' => 'Técnico', 'department_id' => 1],
            ['label' => 'Chefe de Serviços', 'department_id' => 1],
            ['label' => 'Diretor Geral', 'department_id' => 1],
            ['label' => 'Chefe da Secretaria', 'department_id' => 1],
            ['label' => 'Chefe de Recursos Humanos', 'department_id' => 2],
            ['label' => 'Chefe de Receitas', 'department_id' => 3],
            ['label' => 'Chefe de Despesas', 'department_id' => 3],
            ['label' => 'Chefe da Tesouraria', 'department_id' => 3],
            ['label' => 'Chefe do Patrimônio', 'department_id' => 3],
            ['label' => 'Auxiliar Administrativo', 'department_id' => 2],
            ['label' => 'Técnico', 'department_id' => 2],
            ['label' => 'Arquivista', 'department_id' => 2],
            ['label' => 'Assistente Técnico', 'department_id' => 2],
            ['label' => 'Assistente Técnico', 'department_id' => 3],
            ['label' => 'Auxiliar', 'department_id' => 3],
            ['label' => 'Técnico', 'department_id' => 3],
            ['label' => 'Chefe das Oficinas', 'department_id' => 5],
            ['label' => 'Auxiliar', 'department_id' => 5],
            ['label' => 'Mecânico', 'department_id' => 5],
            ['label' => 'Electricista', 'department_id' => 5],
            ['label' => 'Serralheiro', 'department_id' => 5],
            ['label' => 'Chefe de Serviços', 'department_id' => 6],
            ['label' => 'Auxiliar', 'department_id' => 6],
            ['label' => 'Técnico', 'department_id' => 6],
            ['label' => 'Motorista', 'department_id' => 6],
        ];

        DB::table('position_companies')->insert($positions);
    }
}
