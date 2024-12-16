<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case معلق = 'pending';
    case مكتمل = 'completed';
    case مرفوض = 'cancelled';

    // add colors to the enum
    public function color(): string
    {
        return match ($this) {
            self::معلق => 'warning',
            self::مكتمل => 'success',
            self::مرفوض => 'danger',
        };
    }
}
