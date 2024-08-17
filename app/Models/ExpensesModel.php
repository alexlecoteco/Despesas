<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $user_id
 * @property int $value
 * @property string $category_id
 * @property string $description
 */
class ExpensesModel extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'user_id',
        'value',
        'category',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function getUser()
    {
        return $this->user;
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(ExpensesCategoriesModel::class, 'category', 'id');
    }

    public function getCategory()
    {
        return $this->category;
    }
}
