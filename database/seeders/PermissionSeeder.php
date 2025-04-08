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
            ['id' => 1, 'name' => 'view infrastructure report', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'create infrastructure', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'view financial report', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'view expense report', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'create expense', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'view revenue report', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'create revenue', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'pay revenue', 'guard_name' => 'web'],
            ['id' => 9, 'name' => 'view financing report', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'create financing', 'guard_name' => 'web'],
            ['id' => 11, 'name' => 'view investment report', 'guard_name' => 'web'],
            ['id' => 12, 'name' => 'create investment', 'guard_name' => 'web'],
            ['id' => 13, 'name' => 'view financial partners', 'guard_name' => 'web'],
            ['id' => 14, 'name' => 'view financier', 'guard_name' => 'web'],
            ['id' => 15, 'name' => 'create financier', 'guard_name' => 'web'],
            ['id' => 16, 'name' => 'view investor', 'guard_name' => 'web'],
            ['id' => 17, 'name' => 'create investor', 'guard_name' => 'web'],
            ['id' => 18, 'name' => 'view addresses', 'guard_name' => 'web'],
            ['id' => 19, 'name' => 'create address', 'guard_name' => 'web'],
            ['id' => 20, 'name' => 'view activities', 'guard_name' => 'web'],
            ['id' => 21, 'name' => 'create activity', 'guard_name' => 'web'],
            ['id' => 22, 'name' => 'view customer report', 'guard_name' => 'web'],
            ['id' => 23, 'name' => 'create client', 'guard_name' => 'web'],
            ['id' => 24, 'name' => 'view employee report', 'guard_name' => 'web'],
            ['id' => 25, 'name' => 'create employee', 'guard_name' => 'web'],
            ['id' => 28, 'name' => 'update employee', 'guard_name' => 'web'],
            ['id' => 29, 'name' => 'view accounts receivable', 'guard_name' => 'web'],
            ['id' => 30, 'name' => 'pay accounts receivable', 'guard_name' => 'web'],
            ['id' => 31, 'name' => 'view customers', 'guard_name' => 'web'],
            ['id' => 32, 'name' => 'create customer', 'guard_name' => 'web'],
            ['id' => 33, 'name' => 'view customer', 'guard_name' => 'web'],
            ['id' => 34, 'name' => 'request customer service', 'guard_name' => 'web'],
            ['id' => 35, 'name' => 'view licenses', 'guard_name' => 'web'],
            ['id' => 36, 'name' => 'print license', 'guard_name' => 'web'],
            ['id' => 37, 'name' => 'sign license', 'guard_name' => 'web'],
            ['id' => 38, 'name' => 'collect account receivable', 'guard_name' => 'web'],
            ['id' => 39, 'name' => 'view invoices', 'guard_name' => 'web'],
            ['id' => 40, 'name' => 'print invoice', 'guard_name' => 'web'],
            ['id' => 41, 'name' => 'view receipts', 'guard_name' => 'web'],
            ['id' => 42, 'name' => 'print receipts', 'guard_name' => 'web'],
            ['id' => 43, 'name' => 'view suppliers', 'guard_name' => 'web'],
            ['id' => 44, 'name' => 'register supplier', 'guard_name' => 'web'],
            ['id' => 45, 'name' => 'view accounts payable', 'guard_name' => 'web'],
            ['id' => 46, 'name' => 'pay accounts payable', 'guard_name' => 'web'],
            ['id' => 47, 'name' => 'view expenses', 'guard_name' => 'web'],
            ['id' => 48, 'name' => 'enable supplier', 'guard_name' => 'web'],
            ['id' => 49, 'name' => 'disable supplier', 'guard_name' => 'web'],
            ['id' => 50, 'name' => 'disable expense', 'guard_name' => 'web'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
