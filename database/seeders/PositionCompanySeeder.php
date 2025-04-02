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
            ['id' => 1, 'label' => 'Auxiliar', 'department_id' => 1, 'created_at' => '2023-12-04 09:31:43', 'updated_at' => '2023-12-04 09:31:45'],
            ['id' => 2, 'label' => 'Auxiliar Administrativo', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'label' => 'Assistente Tecnico', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'label' => 'Tecnico', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'label' => 'Chefe de Servicos', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'label' => 'Director Geral', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'label' => 'Chefe da Secretaria', 'department_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'label' => 'Chefe do Recursos Humanos', 'department_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'label' => 'Chefe de Receitas', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 15, 'label' => 'Chefe de Despesas', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 17, 'label' => 'Chefe da Tesouraria', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 18, 'label' => 'Chefe do Patrimonio', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 19, 'label' => 'Auxiliar Administrativo', 'department_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 20, 'label' => 'Tecnico', 'department_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 22, 'label' => 'Arquivista', 'department_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 24, 'label' => 'Assistente Tecnico', 'department_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 25, 'label' => 'Assistente Tecnico', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 26, 'label' => 'Auxiliar', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 27, 'label' => 'Tecnico', 'department_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 28, 'label' => 'Chefe das Oficinas', 'department_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 29, 'label' => 'Auxiliar', 'department_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 30, 'label' => 'Mecanico', 'department_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 31, 'label' => 'Electricista', 'department_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 32, 'label' => 'Serralheiro', 'department_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 33, 'label' => 'Chefe de Servicos', 'department_id' => 6, 'created_at' => null, 'updated_at' => null],
            ['id' => 35, 'label' => 'Auxiliar', 'department_id' => 6, 'created_at' => null, 'updated_at' => null],
            ['id' => 36, 'label' => 'Tecnico', 'department_id' => 6, 'created_at' => null, 'updated_at' => null],
            ['id' => 37, 'label' => 'Motorista', 'department_id' => 6, 'created_at' => null, 'updated_at' => null],
        ];

        DB::table('position_companies')->insert($positions);
    }
}
