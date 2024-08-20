<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BudgetModel extends Model
{
    use HasFactory;

    protected $table = 'budgets';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'due_date',
        'associated_budget_id'
    ];
}
