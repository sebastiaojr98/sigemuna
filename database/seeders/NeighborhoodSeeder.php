<?php

namespace Database\Seeders;

use App\Models\Neighborhood;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Neighborhood::insert([
            ["label" => "Anchilo", "administrative_post_id" => 1],
            ["label" => "Namachilo", "administrative_post_id" => 1],
            ["label" => "Namigonha", "administrative_post_id" => 1],
            ["label" => "Napuri", "administrative_post_id" => 1],
            ["label" => "Saua-Saua", "administrative_post_id" => 1],

            ["label" => "22 de Agosto", "administrative_post_id" => 2],
            ["label" => "Muahivire", "administrative_post_id" => 2],
            ["label" => "Namiteca", "administrative_post_id" => 2],

            ["label" => "Muhala", "administrative_post_id" => 3],
            ["label" => "Namutaqueliua", "administrative_post_id" => 3],

            ["label" => "Muatala", "administrative_post_id" => 4],
            ["label" => "Mutauhanha", "administrative_post_id" => 4],

            ["label" => "Namikopo", "administrative_post_id" => 5],
            ["label" => "Mutava-Rex", "administrative_post_id" => 5],

            ["label" => "Napipine", "administrative_post_id" => 6],
            ["label" => "Carrupeia", "administrative_post_id" => 6],

            ["label" => "Natikire", "administrative_post_id" => 7],
            ["label" => "Marrupaniua", "administrative_post_id" => 7],
            ["label" => "Marrere", "administrative_post_id" => 7],

            ["label" => "Bombeiros", "administrative_post_id" => 8],
            ["label" => "25 de Setembro", "administrative_post_id" => 8],
            ["label" => "1º de Maio", "administrative_post_id" => 8],
            ["label" => "Limoeiros", "administrative_post_id" => 8],
            ["label" => "Liberdade", "administrative_post_id" => 8],
            ["label" => "Militar", "administrative_post_id" => 8],
        ]);
    }
}
