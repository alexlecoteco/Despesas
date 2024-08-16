<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCategoriesModel extends Model
{
    use HasFactory;

    protected $table = 'expenses_categories';
    protected $fillable = [
        'description',
    ];
}
