<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\Enums\ScanType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScanHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scan_type',
        'image_path',
        'result',
        'scanned_at',
    ];

    protected function casts(): array
    {
        return [
            'scan_type' => ScanType::class,
            'result' => 'array',
            'scanned_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
