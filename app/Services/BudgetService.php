<?php

namespace App\Services;

use App\DataTransferObjects\BudgetObject;
use App\Repository\BudgetRepository;
use Illuminate\Http\Resources\Json\JsonResource;

readonly class BudgetService
{

    public function __construct(private BudgetRepository $budgetRepository)
    {
    }

    public function create(BudgetObject $data): JsonResource
    {
        $budgetCreated = $this->budgetRepository->create(
            name: $data->getName(),
            amount: $data->getAmount(),
            dueDate: $data->getDueDate(),
            description: $data->getDescription(),
            associatedBudget: $data->getAssociatedBudget()
        );
        return JsonResource::make($budgetCreated);
    }

    public function show(int $id): JsonResource
    {
        $budget = $this->budgetRepository->show($id);
        return JsonResource::make($budget);
    }

    public function delete(int $id): int
    {
        return $this->budgetRepository->delete($id);
    }
}
