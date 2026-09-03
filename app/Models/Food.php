<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'category',
        'image',
        'calories',
        'protein',
        'carbohydrate',
        'fat',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'calories' => 'float',
            'protein' => 'float',
            'carbohydrate' => 'float',
            'fat' => 'float',
        ];
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function foodIngredients(): HasMany
    {
        return $this->hasMany(FoodIngredient::class);
    }

    public function recipe(): HasOne
    {
        return $this->hasOne(Recipe::class);
    }

    public function barcodes(): HasMany
    {
        return $this->hasMany(Barcode::class);
    }

    public function consumptionLogs(): HasMany
    {
        return $this->hasMany(ConsumptionLog::class);
    }

    public function recommendations(): HasMany
    {
        return $this->hasMany(Recommendation::class);
    }

    public function scopeSearch(Builder $query, ?string $keyword): Builder
    {
        if (blank($keyword)) {
            return $query;
        }

        return $query->where('name', 'like', "%{$keyword}%");
    }

    public function scopeByCategory(Builder $query, ?string $category): Builder
    {
        if (blank($category)) {
            return $query;
        }

        return $query->where('category', $category);
    }
}
