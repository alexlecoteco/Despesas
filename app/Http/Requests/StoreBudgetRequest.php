<?php

namespace App\Http\Requests;

use App\DataTransferObjects\BudgetObject;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required,string',
            'amount' => 'required,numeric',
            'due_date' => 'required,date',
            'description' => 'nullable,string',
            'associated_budget_id' => 'nullable,exists:budgets,id'
        ];
    }

    public function getBudgetObject(): BudgetObject
    {
        return new BudgetObject(
            $this->input('name'),
            $this->input('amount'),
            $this->input('due_date'),
            $this->input('description'),
            $this->input('associated_budget_id')
        );
    }
}
