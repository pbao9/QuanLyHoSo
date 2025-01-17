<?php

namespace App\Enums\Order;

use App\Supports\Enum;

enum PaymentStatus: int
{
    use Enum;

    case UnPaid = 1;
    case Paid = 2;

    public function badge(): string
    {
        return match ($this) {
            self::UnPaid => 'bg-orange',
            self::Paid => 'bg-green',
        };
    }
}
