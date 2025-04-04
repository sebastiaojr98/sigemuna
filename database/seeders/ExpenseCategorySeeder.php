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
            ['label' => 'Salário e Remuneração', 'description' => 'Salário e Remuneração'],
            ['label' => 'Formação dos Técnicos', 'description' => 'Formação dos Técnicos'],
            ['label' => 'Treinamento dos Técnicos', 'description' => 'Treinamento dos Técnicos'],
            ['label' => 'Ajudas de Custos', 'description' => 'Ajudas de Custos'],
            ['label' => 'Reabilitação', 'description' => 'Reabilitação'],
            ['label' => 'Construção', 'description' => 'Construção'],
            ['label' => 'Instalações e Equipamentos de Trabalho', 'description' => 'Instalações e Equipamentos de Trabalho'],
            ['label' => 'Contratação de Firma', 'description' => 'Contratação de Firma'],
            ['label' => 'Aquisição de Veículos Ligeiros', 'description' => 'Aquisição de Veículos Ligeiros'],
            ['label' => 'Aquisição de Veículos Pesados', 'description' => 'Aquisição de Veículos Pesados'],
            ['label' => 'Aquisição de Acessórios para Viaturas', 'description' => 'Aquisição de Acessórios para Viaturas'],
            ['label' => 'Aquisição de Equipamentos de Proteção Individual', 'description' => 'Aquisição de Equipamentos de Proteção Individual'],
            ['label' => 'Aquisição de Instrumentos de Apoio à Gestão', 'description' => 'Aquisição de Instrumentos de Apoio à Gestão'],
            ['label' => 'Contratação de Consultorias', 'description' => 'Contratação de Consultorias'],
            ['label' => 'Investimentos em Infraestruturas', 'description' => 'Investimentos em Infraestruturas'],
            ['label' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem', 'description' => 'Aquisição de Material de Apoio para Limpeza das Valas de Drenagem'],
            ['label' => 'Aquisição de Material de Construção', 'description' => 'Aquisição de Material de Construção'],
            ['label' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)', 'description' => 'Aquisição de Material para Manutenção (Manilhas, Tampas, Grelhas)'],
            ['label' => 'Comunicação', 'description' => 'Comunicação'],
            ['label' => 'Aquisição de Equipamentos Informáticos', 'description' => 'Aquisição de Equipamentos Informáticos'],
            ['label' => 'Marketing e Publicidade', 'description' => 'Marketing e Publicidade'],
            ['label' => 'Promoção dos Serviços de Saneamento', 'description' => 'Promoção dos Serviços de Saneamento'],
            ['label' => 'Elaboração de Manual de Entidade Visual', 'description' => 'Elaboração de Manual de Entidade Visual'],
            ['label' => 'Aquisição de Recargas', 'description' => 'Aquisição de Recargas'],
            ['label' => 'Aquisição de Passagens Aéreas', 'description' => 'Aquisição de Passagens Aéreas'],
            ['label' => 'Aquisição de Consumíveis de Escritório', 'description' => 'Aquisição de Consumíveis de Escritório'],
            ['label' => 'Aquisição de Gêneros Alimentícios', 'description' => 'Aquisição de Gêneros Alimentícios'],
            ['label' => 'Prestação de Serviços de Catering', 'description' => 'Prestação de Serviços de Catering'],
            ['label' => 'Aquisição de Materiais de Higiene e Limpeza', 'description' => 'Aquisição de Materiais de Higiene e Limpeza'],
            ['label' => 'Manutenção e Reparação de Equipamentos Informáticos', 'description' => 'Manutenção e Reparação de Equipamentos Informáticos'],
            ['label' => 'Manutenção e Reparação de Meios Circulantes', 'description' => 'Manutenção e Reparação de Meios Circulantes'],
            ['label' => 'Aquisição de Combustíveis e Lubrificantes', 'description' => 'Aquisição de Combustíveis e Lubrificantes'],
            ['label' => 'Transporte e Carga', 'description' => 'Transporte e Carga'],
            ['label' => 'Seguros', 'description' => 'Seguros'],
            ['label' => 'Jornal', 'description' => 'Jornal'],
            ['label' => 'Rádio', 'description' => 'Rádio'],
            ['label' => 'Água', 'description' => 'Água'],
            ['label' => 'Energia (Eletricidade)', 'description' => 'Energia (Eletricidade)']
        ];

        DB::table('expense_categories')->insert($categories);
    }
}
