<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\Enums\MealType;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsumptionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'meal_type',
        'quantity',
        'consumed_at',
    ];

    protected function casts(): array
    {
        return [
            'meal_type' => MealType::class,
            'quantity' => 'integer',
            'consumed_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('consumed_at', today());
    }

    public function scopeForUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    public function scopeBetweenDates(Builder $query, CarbonInterface $start, CarbonInterface $end): Builder
    {
        return $query->whereBetween('consumed_at', [$start, $end]);
    }
}
