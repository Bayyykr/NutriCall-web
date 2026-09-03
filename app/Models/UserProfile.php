<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\Enums\ActivityLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'activity_level',
    ];

    protected function casts(): array
    {
        return [
            'age' => 'integer',
            'activity_level' => ActivityLevel::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
