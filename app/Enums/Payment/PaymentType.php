<?php

namespace App\Enums\Payment;

use App\Supports\Enum;

enum PaymentType: int
{
    use Enum;

    case Full = 1;
    case Installment = 2;

    public function badge(): string
    {
        return match ($this) {
            PaymentType::Full => 'bg-green',
            PaymentType::Installment => 'bg-red',
        };
    }
}
