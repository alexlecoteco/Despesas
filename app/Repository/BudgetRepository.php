<?php

namespace App\Repository;

use App\Models\BudgetModel;
use App\Models\ExpensesModel;
use Illuminate\Support\Carbon;

readonly class BudgetRepository
{
     public function __construct(private BudgetModel $budgetModel)
     {
     }

    public function show(int $id)
    {
        return $this->budgetModel->find($id);
    }

    public function paginate()
    {
        /*
         * TODO
         * Adicionar filtro de nome
         * adicionar filtro de descrição
         * adicionar filtro de data_final
         * adicionar filtro de orçamentos relacionados
         */
        return $this->budgetModel->paginate();
    }

    public function create(
        string $name,
        string $amount,
        Carbon $dueDate,
        ?string $description = null,
        ?BudgetModel $associatedBudget = null
    ): ExpensesModel
    {
        return $this->budgetModel->create([
            'name' => $name,
            'description' => $description,
            'amount' => $amount,
            'due_date' => $dueDate,
            'associated_budget_id' => $associatedBudget?->id,
        ]);
    }

    public function delete(int $id): int
    {
        return $this->budgetModel->destroy($id);
    }
}
