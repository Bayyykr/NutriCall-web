<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'food_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function foodIngredients(): HasMany
    {
        return $this->hasMany(FoodIngredient::class);
    }
}
