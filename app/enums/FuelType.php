<?php

namespace App\Enums;

enum FuelType: string
{
    case بنرين = 'petrol';
    case ديزل = 'diesel';
    case قاز = 'jet_alpha_1';

    public function label(): string
    {
        return match ($this) {
            self::بنرين => 'بنزين',
            self::ديزل => 'ديزل',
            self::قاز => 'قاز',
        };
    }
}
