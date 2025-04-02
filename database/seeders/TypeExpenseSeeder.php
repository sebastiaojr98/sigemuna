<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            ['id' => 1, 'label' => 'Salário e Remuneração', 'description' => 'Salário e Remuneração', 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'label' => 'Formação dos Técnicos', 'description' => 'Formação dos Técnicos', 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'label' => 'Treinamento dos Técnicos', 'description' => 'Treinamento dos Técnicos', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'label' => 'Ajudas de Custos', 'description' => 'Ajudas de Custos', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'label' => 'Reabilitação', 'description' => 'Reabilitação', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'label' => 'Construção', 'description' => 'Construção', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'label' => 'Instalações e Equipamentos de Trabalho', 'description' => 'Instalações e Equipamentos de Trabalho', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'label' => 'Contratação de Firma', 'description' => 'Contratação de Firma', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'label' => 'Aquisição de Veículos Ligeiros', 'description' => 'Aquisição de Veículos Ligeiros', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'label' => 'Aquisição de Veículos Pesados', 'description' => 'Aquisição de Veículos Pesados', 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'label' => 'Aquisição de Acessórios para Viaturas', 'description' => 'Aquisição de Acessórios para Viaturas', 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'label' => 'Aquisição de Equipamentos de Proteção Individual', 'description' => 'Aquisição de Equipamentos de Proteção Individual', 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'label' => 'Aquisição de Instrumentos de Apoio à Gestão', 'description' => 'Aquisição de Instrumentos de Apoio à Gestão', 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'label' => 'Contratação de Consultorias', 'description' => 'Contratação de Consultorias', 'created_at' => null, 'updated_at' => null],
            ['id' => 15, 'label' => 'Investimentos em Infraestruturas', 'description' => 'Investimentos em Infraestruturas', 'created_at' => null, 'updated_at' => null],
            ['id' => 16, 'label' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem', 'description' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem', 'created_at' => null, 'updated_at' => null],
            ['id' => 17, 'label' => 'Aquisição de Material de Construção', 'description' => 'Aquisição de Material de Construção', 'created_at' => null, 'updated_at' => null],
            ['id' => 18, 'label' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)', 'description' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)', 'created_at' => null, 'updated_at' => null],
            ['id' => 19, 'label' => 'Comunicação', 'description' => 'Comunicação', 'created_at' => null, 'updated_at' => null],
            ['id' => 20, 'label' => 'Aquisição de Equipamentos Informáticos', 'description' => 'Aquisição de Equipamentos Informáticos', 'created_at' => null, 'updated_at' => null],
            ['id' => 21, 'label' => 'Marketing e Publicidade', 'description' => 'Marketing e Publicidade', 'created_at' => null, 'updated_at' => null],
            ['id' => 22, 'label' => 'Promoção dos Serviços de Saneamento', 'description' => 'Promoção dos Serviços de Saneamento', 'created_at' => null, 'updated_at' => null],
            ['id' => 23, 'label' => 'Elaboração de Manual de Entidade Visual', 'description' => 'Elaboração de Manual de Entidade Visual', 'created_at' => null, 'updated_at' => null],
            ['id' => 24, 'label' => 'Aquisição de Recargas', 'description' => 'Aquisição de Recargas', 'created_at' => null, 'updated_at' => null],
            ['id' => 25, 'label' => 'Aquisição de Passagens Aéreas', 'description' => 'Aquisição de Passagens Aéreas', 'created_at' => null, 'updated_at' => null],
            ['id' => 26, 'label' => 'Aquisição de Consumíveis de Escritório', 'description' => 'Aquisição de Consumíveis de Escritório', 'created_at' => null, 'updated_at' => null],
            ['id' => 27, 'label' => 'Aquisição de Gêneros Alimentícios', 'description' => 'Aquisição de Gêneros Alimentícios', 'created_at' => null, 'updated_at' => null],
            ['id' => 28, 'label' => 'Prestação de Serviços de Catering', 'description' => 'Prestação de Serviços de Catering', 'created_at' => null, 'updated_at' => null],
            ['id' => 29, 'label' => 'Aquisição de Materiais de Higiene e Limpeza', 'description' => 'Aquisição de Materiais de Higiene e Limpeza', 'created_at' => null, 'updated_at' => null],
            ['id' => 30, 'label' => 'Manutenção e Reparação de Equipamentos Informáticos', 'description' => 'Manutenção e Reparação de Equipamentos Informáticos', 'created_at' => null, 'updated_at' => null],
            ['id' => 31, 'label' => 'Manutenção e Reparação de Meios Circulantes', 'description' => 'Manutenção e Reparação de Meios Circulantes', 'created_at' => null, 'updated_at' => null],
            ['id' => 32, 'label' => 'Aquisição de Combustíveis e Lubrificantes', 'description' => 'Aquisição de Combustíveis e Lubrificantes', 'created_at' => null, 'updated_at' => null],
            ['id' => 33, 'label' => 'Transporte e Carga', 'description' => 'Transporte e Carga', 'created_at' => null, 'updated_at' => null],
            ['id' => 34, 'label' => 'Seguros', 'description' => 'Seguros', 'created_at' => null, 'updated_at' => null],
            ['id' => 35, 'label' => 'Jornal', 'description' => 'Jornal', 'created_at' => null, 'updated_at' => null],
            ['id' => 36, 'label' => 'Rádio', 'description' => 'Rádio', 'created_at' => null, 'updated_at' => null],
            ['id' => 37, 'label' => 'Água', 'description' => 'Água', 'created_at' => null, 'updated_at' => null],
            ['id' => 38, 'label' => 'Energia (Eletricidade)', 'description' => 'Energia (Eletricidade)', 'created_at' => null, 'updated_at' => null],
        ];

        DB::table('type_expenses')->insert($expenses);
    }
}
