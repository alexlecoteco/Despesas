<?php

namespace App\Services;

use App\Repository\ExpensesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesService
{

    public function __construct(private readonly ExpensesRepository $expensesRepository)
    {
    }

    public function show(int $id): JsonResource
    {
        $expense = $this->expensesRepository->show($id);
        return JsonResource::make($expense);
    }

    public function paginate(array $data): AnonymousResourceCollection
    {
        $expenses = $this->expensesRepository->paginate($data);
        return JsonResource::collection($expenses);
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
