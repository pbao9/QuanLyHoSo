<?php

namespace App\Enums\ShiftDepartment;

use App\Supports\Enum;


/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
enum ShiftStatusEnum: int
{

    use Enum;

    case active = 0;
    case unactive = 1;
}
