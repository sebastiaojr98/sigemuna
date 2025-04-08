<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2023-11-16 21:32:55',
                'updated_at' => '2023-11-16 21:32:55'
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
