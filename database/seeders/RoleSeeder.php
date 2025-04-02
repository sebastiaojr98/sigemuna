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
            ],
            [
                'id' => 2,
                'name' => 'sanitation technique',
                'guard_name' => 'web',
                'created_at' => '2023-11-17 12:27:21',
                'updated_at' => '2023-11-17 12:27:23'
            ],
            [
                'id' => 3,
                'name' => 'finance technique',
                'guard_name' => 'web',
                'created_at' => '2023-11-21 09:00:40',
                'updated_at' => '2023-11-21 09:00:42'
            ],
            [
                'id' => 4,
                'name' => 'administrative technique',
                'guard_name' => 'web',
                'created_at' => '2023-11-29 12:24:50',
                'updated_at' => '2023-11-29 12:24:57'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
