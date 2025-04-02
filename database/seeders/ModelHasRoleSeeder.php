<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelHasRoles = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1],
        ];

        DB::table('model_has_roles')->insert($modelHasRoles);
    }
}
