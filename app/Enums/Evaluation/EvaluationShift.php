<?php

namespace App\Enums\Evaluation;

use App\Supports\Enum;

enum EvaluationShift: int
{
    use Enum;
    case shift_1 = 0;
    case shift_2 = 1;
    case shift_3 = 2;
    case day_shift = 3;
    case night_shift = 4;

    public function badge()
    {
        return match ($this) {
            EvaluationShift::shift_1 => '',
            EvaluationShift::shift_2 => 'bg-green',
            EvaluationShift::shift_3 => 'bg-warning',
            EvaluationShift::day_shift => 'bg-warning',
            EvaluationShift::night_shift => 'bg-cyan',
        };
    }
}
