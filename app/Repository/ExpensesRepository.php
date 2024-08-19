<?php

namespace App\Repository;

use App\Models\ExpensesCategoriesModel;
use App\Models\ExpensesModel;
use App\Models\User;
use Illuminate\Support\Carbon;

class ExpensesRepository
{
     public function __construct(private ExpensesModel $expensesModel)
     {
     }

    public function show(int $id)
    {
        return $this->expensesModel->find($id);
    }

    public function paginate()
    {
        /*
         * TODO
         * Adicionar filtro de valor
         * adicionar filtro de categoria
         * adicionar filtro de usuário
         * adicionar filtro de data
         * adicionar filtro de ordenação
         */
        return $this->expensesModel->paginate();
    }

    public function create(
        User $user,
        string $value,
        string $consolidatorId,
        Carbon $consolidatorDate,
        ?string $description = null,
        ?ExpensesCategoriesModel $category = null
    ): ExpensesModel
    {
        return $this->expensesModel->create([
            'user_id' => $user->id,
            'category_id' => $category?->id,
            'value' => $value,
            'consolidator_id' => $consolidatorId,
            'consolidator_date' => $consolidatorDate->format('Y-m-d'),
            'description' => $description
        ]);
    }

    public function delete(int $id): int
    {
        return $this->expensesModel->destroy($id);
    }
}
