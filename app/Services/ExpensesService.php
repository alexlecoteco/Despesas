<?php

namespace App\Services;

use App\Http\Resources\ExpenseResource;
use App\Repository\ExpensesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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

    public function importFromCsv(array $fileContents): void
    {
        foreach ($fileContents as $key => $line) {

            if ($key === 0) {continue;}

            $data = str_getcsv($line);

            $this->expensesRepository->create([
                'user_id' => 1,
                'category_id' => null,
                'value' => number_format($data[1], 2,'',''),
                'consolidator_id' => $data[2],
                'consolidator_date' => Carbon::createFromFormat("d/m/Y",$data[0])?->format('Y-m-d'),
                'description' => $data[3]
            ]);
        }
    }
}
