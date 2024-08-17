<?php

namespace App\Services;

use App\Http\Resources\ExpenseResource;
use App\Repository\ExpensesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

readonly class ExpensesService
{

    public function __construct(private ExpensesRepository $expensesRepository)
    {
    }

    public function show(int $id): JsonResource
    {
        $expense = $this->expensesRepository->show($id);
        return ExpenseResource::make($expense);
    }

    public function paginate(): AnonymousResourceCollection
    {
        $expenses = $this->expensesRepository->paginate();
        return ExpenseResource::collection($expenses);
    }
    public function create(array $data): JsonResource
    {
        $expenseCreated = $this->expensesRepository->create($data);
        return JsonResource::make($expenseCreated);
    }

    public function update(array $data): JsonResource
    {
        $expenseUpdated = $this->expensesRepository->update($data);
        return JsonResource::make($expenseUpdated);
    }

    public function destroy(int $id): JsonResource
    {
        $this->expensesRepository->delete($id);
        return JsonResource::make();
    }
}
