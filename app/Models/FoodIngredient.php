<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodIngredient extends Model
{
    use HasFactory;

    protected $table = 'food_ingredients';

    protected $fillable = [
        'food_id',
        'ingredient_id',
        'quantity',
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
