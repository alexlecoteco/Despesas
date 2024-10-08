<?php

namespace App\Http\Resources;

use App\Models\ExpensesCategoriesModel;
use App\Models\ExpensesModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ExpensesModel
 */
class ExpenseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->user),
            'value' => $this->value,
            'category' => CategoryResource::make($this->category),
            'description' => $this->description
        ];
    }
}
