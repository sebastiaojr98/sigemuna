<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            ['id' => 1, 'label' => 'Administrativo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'label' => 'Recursos Humanos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'label' => 'Finança', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'label' => 'Planificação, Estudos e Projectos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'label' => 'Operação e Manutenção de Equipamentos', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'label' => 'Gestão de Residuos Sólidos', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
