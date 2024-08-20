<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenditureBudgetModel extends Model
{
    use HasFactory;

    protected $table = 'expenditure_budget';

    protected $fillable = [
        'expenditure_id',
        'budget_id'
    ];
}
