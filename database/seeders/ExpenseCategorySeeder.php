<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Salário e Remuneração', 'description' => 'Salário e Remuneração'],
            ['name' => 'Formação dos Técnicos', 'description' => 'Formação dos Técnicos'],
            ['name' => 'Treinamento dos Técnicos', 'description' => 'Treinamento dos Técnicos'],
            ['name' => 'Ajudas de Custos', 'description' => 'Ajudas de Custos'],
            ['name' => 'Reabilitação', 'description' => 'Reabilitação'],
            ['name' => 'Construção', 'description' => 'Construção'],
            ['name' => 'Instalações e Equipamentos de Trabalho', 'description' => 'Instalações e Equipamentos de Trabalho'],
            ['name' => 'Contratação de Firma', 'description' => 'Contratação de Firma'],
            ['name' => 'Aquisição de Veículos Ligeiros', 'description' => 'Aquisição de Veículos Ligeiros'],
            ['name' => 'Aquisição de Veículos Pesados', 'description' => 'Aquisição de Veículos Pesados'],
            ['name' => 'Aquisição de Acessórios para Viaturas', 'description' => 'Aquisição de Acessórios para Viaturas'],
            ['name' => 'Aquisição de Equipamentos de Proteção Individual', 'description' => 'Aquisição de Equipamentos de Proteção Individual'],
            ['name' => 'Aquisição de Instrumentos de Apoio à Gestão', 'description' => 'Aquisição de Instrumentos de Apoio à Gestão'],
            ['name' => 'Contratação de Consultorias', 'description' => 'Contratação de Consultorias'],
            ['name' => 'Investimentos em Infraestruturas', 'description' => 'Investimentos em Infraestruturas'],
            ['name' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem', 'description' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem'],
            ['name' => 'Aquisição de Material de Construção', 'description' => 'Aquisição de Material de Construção'],
            ['name' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)', 'description' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)'],
            ['name' => 'Comunicação', 'description' => 'Comunicação'],
            ['name' => 'Aquisição de Equipamentos Informáticos', 'description' => 'Aquisição de Equipamentos Informáticos'],
            ['name' => 'Marketing e Publicidade', 'description' => 'Marketing e Publicidade'],
            ['name' => 'Promoção dos Serviços de Saneamento', 'description' => 'Promoção dos Serviços de Saneamento'],
            ['name' => 'Elaboração de Manual de Entidade Visual', 'description' => 'Elaboração de Manual de Entidade Visual'],
            ['name' => 'Aquisição de Recargas', 'description' => 'Aquisição de Recargas'],
            ['name' => 'Aquisição de Passagens Aéreas', 'description' => 'Aquisição de Passagens Aéreas'],
            ['name' => 'Aquisição de Consumíveis de Escritório', 'description' => 'Aquisição de Consumíveis de Escritório'],
            ['name' => 'Aquisição de Gêneros Alimentícios', 'description' => 'Aquisição de Gêneros Alimentícios'],
            ['name' => 'Prestação de Serviços de Catering', 'description' => 'Prestação de Serviços de Catering'],
            ['name' => 'Aquisição de Materiais de Higiene e Limpeza', 'description' => 'Aquisição de Materiais de Higiene e Limpeza'],
            ['name' => 'Manutenção e Reparação de Equipamentos Informáticos', 'description' => 'Manutenção e Reparação de Equipamentos Informáticos'],
            ['name' => 'Manutenção e Reparação de Meios Circulantes', 'description' => 'Manutenção e Reparação de Meios Circulantes'],
            ['name' => 'Aquisição de Combustíveis e Lubrificantes', 'description' => 'Aquisição de Combustíveis e Lubrificantes'],
            ['name' => 'Transporte e Carga', 'description' => 'Transporte e Carga'],
            ['name' => 'Seguros', 'description' => 'Seguros'],
            ['name' => 'Jornal', 'description' => 'Jornal'],
            ['name' => 'Rádio', 'description' => 'Rádio'],
            ['name' => 'Água', 'description' => 'Água'],
            ['name' => 'Energia (Eletricidade)', 'description' => 'Energia (Eletricidade)']
        ];

        DB::table('expense_categories')->insert($categories);
    }
}
