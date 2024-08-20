<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBudgetRequest;
use App\Models\User;
use App\Services\BudgetService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BudgetController extends Controller
{
    public function __construct(private readonly BudgetService $budgetService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBudgetRequest $request): JsonResource
    {
        return $this->budgetService->create($request->getBudgetObject());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->budgetService->show($user->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
