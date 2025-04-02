<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdministrativePost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdministrativePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdministrativePost::insert([
            [ 'id' => 1, 'label' => 'Anchilo'],
            [ 'id' => 2, 'label' => 'Muahivire'],
            [ 'id' => 3, 'label' => 'Muhala'],
            [ 'id' => 4, 'label' => 'Muatala'],
            [ 'id' => 5, 'label' => 'Namikopo'],
            [ 'id' => 6, 'label' => 'Napipine'],
            [ 'id' => 7, 'label' => 'Natikire'],
            [ 'id' => 8, 'label' => 'Urbano Central'],
        ]);
    }
}
