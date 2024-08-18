<?php

namespace App\Services;

use App\Http\Resources\ExpenseResource;
use App\Models\User;
use App\Repository\ExpensesRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

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

    public function importFromCsv(array $fileContents): JsonResource
    {
        foreach ($fileContents as $key => $line) {

            if($key === 0) {
                continue;
            }

            $data = str_getcsv($line);

            /*
             * TODO
             * criar uma DTO para receber esses valores de data
             * Receber o usuário pelo token
             * Passar responsabilidade de mexer no banco de dados para o repository
             */
            $user = User::first();

            DB::transaction(function () use ($data, $user) {
                $this->expensesRepository->create(
                    $user,
                    $data[1],
                    $data[2],
                    $data[0],
                    $data[3]
                );
            });

        }
        return JsonResource::make([ "message" => "Import from CSV was successful"]);

    }
}
