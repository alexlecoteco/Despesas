<?php

namespace App\Http\Controllers;

use App\Models\ExpensesModel;
use App\Services\ExpensesService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpensesController extends Controller
{
    public function __construct(private readonly ExpensesService $expensesService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->expensesService->paginate($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResource
    {
        return $this->expensesService->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResource
    {
        return $this->expensesService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResource
    {
        return $this->expensesService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResource
    {
        return $this->expensesService->destroy($id);
    }

    public function importFromCsv(Request $request): JsonResource
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        return $this->expensesService->importFromCsv($fileContents);
    }
}
