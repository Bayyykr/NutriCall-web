<?php

declare(strict_types=1);

namespace App\Support\Enums;

enum ActivityLevel: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function label(): string
    {
        return match ($this) {
            self::LOW => 'Low Activity',
            self::MEDIUM => 'Medium Activity',
            self::HIGH => 'High Activity',
        };
    }
}
