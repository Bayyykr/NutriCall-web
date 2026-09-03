<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EatingHabit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'breakfast',
        'lunch',
        'dinner',
        'snack',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
