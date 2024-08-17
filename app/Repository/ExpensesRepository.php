<?php

namespace App\Repository;

use App\Models\ExpensesModel;

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

    public function create(array $data)
    {
        return $this->expensesModel->create($data);
    }

    public function delete(int $id): int
    {
        return $this->expensesModel->destroy($id);
    }
}
