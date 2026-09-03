<?php

declare(strict_types=1);

namespace App\Support\Enums;

enum ScanType: string
{
    case FOOD = 'food';
    case INGREDIENT = 'ingredient';
    case BARCODE = 'barcode';

    public function label(): string
    {
        return match ($this) {
            self::FOOD => 'Scan Food',
            self::INGREDIENT => 'Scan Ingredients',
            self::BARCODE => 'Scan Barcode',
        };
    }
}
