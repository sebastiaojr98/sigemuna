<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::insert([
            ['id' => 1, 'label' => 'BI', 'description' => 'Bilhete de Identificação'],
            ['id' => 2, 'label' => 'CP', 'description' => 'Cédula Pessoal'],
            ['id' => 3, 'label' => 'DIRE', 'description' => 'Documento de Identificação e Residência para Estrangeiro'],
            ['id' => 4, 'label' => 'CC', 'description' => 'Carta de Condução'],
        ]);
    }
}
