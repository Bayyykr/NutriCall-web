<?php

declare(strict_types=1);

namespace App\Support\Enums;

enum PeriodType: string
{
    case DAY = 'day';
    case WEEK = 'week';
    case MONTH = 'month';

    public function label(): string
    {
        return match ($this) {
            self::DAY => 'Day',
            self::WEEK => 'Week',
            self::MONTH => 'Month',
        };
    }
}
