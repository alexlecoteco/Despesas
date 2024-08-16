<?php

namespace Database\Seeders;

use App\Models\ExpensesCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExpenseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expensesFactory = ExpensesCategories::factory();

        $categories = [
           'Comida',
           'Casamento',
           'Pessoal',
           'Transporte',
           'Alimentacao',
           'Lazer',
           'Saude',
           'Educacao',
           'Salario',
           'Aluguel',
           'Outros',
        ];

        foreach ($categories as $category) {
            $expensesFactory->create(['description' => $category]);
        }
    }
}
