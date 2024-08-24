<?php

namespace App\Http\Requests;

use App\DataTransferObjects\BudgetObject;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreBudgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'description' => 'nullable',
            'associated_budget_id' => 'nullable|exists:budgets,id'
        ];
    }

    public function getBudgetObject(): BudgetObject
    {
        return new BudgetObject(
            $this->input('name'),
            $this->input('amount'),
            Carbon::parse($this->input('due_date')),
            $this->input('description'),
            $this->input('associated_budget_id')
        );
    }
}
