<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'view infrastructure report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:43:15', 'updated_at' => '2023-11-16 20:43:15'],
            ['id' => 2, 'name' => 'create infrastructure', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:44:52', 'updated_at' => '2023-11-16 20:44:52'],
            ['id' => 3, 'name' => 'view financial report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:48:47', 'updated_at' => '2023-11-16 20:48:47'],
            ['id' => 4, 'name' => 'view expense report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:49:54', 'updated_at' => '2023-11-16 20:49:54'],
            ['id' => 5, 'name' => 'create expense', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:50:56', 'updated_at' => '2023-11-16 20:50:56'],
            ['id' => 6, 'name' => 'view revenue report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:53:15', 'updated_at' => '2023-11-16 20:53:15'],
            ['id' => 7, 'name' => 'create revenue', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:54:10', 'updated_at' => '2023-11-16 20:54:10'],
            ['id' => 8, 'name' => 'pay revenue', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:55:12', 'updated_at' => '2023-11-16 20:55:12'],
            ['id' => 9, 'name' => 'view financing report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:56:53', 'updated_at' => '2023-11-16 20:56:53'],
            ['id' => 10, 'name' => 'create financing', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:57:23', 'updated_at' => '2023-11-16 20:57:23'],
            ['id' => 11, 'name' => 'view investment report', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:58:40', 'updated_at' => '2023-11-16 20:58:40'],
            ['id' => 12, 'name' => 'create investment', 'guard_name' => 'web', 'created_at' => '2023-11-16 20:59:55', 'updated_at' => '2023-11-16 20:59:55'],
            ['id' => 13, 'name' => 'view financial partners', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:01:51', 'updated_at' => '2023-11-16 21:01:51'],
            ['id' => 14, 'name' => 'view financier', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:05:23', 'updated_at' => '2023-11-16 21:05:23'],
            ['id' => 15, 'name' => 'create financier', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:05:28', 'updated_at' => '2023-11-16 21:05:28'],
            ['id' => 16, 'name' => 'view investor', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:05:36', 'updated_at' => '2023-11-16 21:05:36'],
            ['id' => 17, 'name' => 'create investor', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:05:42', 'updated_at' => '2023-11-16 21:05:42'],
            ['id' => 18, 'name' => 'view addresses', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:07:50', 'updated_at' => '2023-11-16 21:07:50'],
            ['id' => 19, 'name' => 'create address', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:08:03', 'updated_at' => '2023-11-16 21:08:03'],
            ['id' => 20, 'name' => 'view activities', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:09:47', 'updated_at' => '2023-11-16 21:09:47'],
            ['id' => 21, 'name' => 'create activity', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:09:57', 'updated_at' => '2023-11-16 21:09:57'],
            ['id' => 22, 'name' => 'view customer report', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:13:47', 'updated_at' => '2023-11-16 21:13:47'],
            ['id' => 23, 'name' => 'create client', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:14:02', 'updated_at' => '2023-11-16 21:14:02'],
            ['id' => 24, 'name' => 'view employee report', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:14:27', 'updated_at' => '2023-11-16 21:14:27'],
            ['id' => 25, 'name' => 'create employee', 'guard_name' => 'web', 'created_at' => '2023-11-16 21:14:43', 'updated_at' => '2023-11-16 21:14:43'],
            ['id' => 28, 'name' => 'update employee', 'guard_name' => 'web', 'created_at' => '2023-11-16 22:57:47', 'updated_at' => '2023-11-16 22:57:47'],
            ['id' => 29, 'name' => 'view accounts receivable', 'guard_name' => 'web', 'created_at' => '2023-11-16 22:57:47', 'updated_at' => '2023-11-16 22:57:47'],
            ['id' => 30, 'name' => 'pay accounts receivable', 'guard_name' => 'web', 'created_at' => '2023-11-16 22:57:47', 'updated_at' => '2023-11-16 22:57:47'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
