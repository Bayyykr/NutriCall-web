<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'cooking_time',
        'instructions',
    ];

    protected function casts(): array
    {
        return [
            'cooking_time' => 'integer',
            'instructions' => 'array',
        ];
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
