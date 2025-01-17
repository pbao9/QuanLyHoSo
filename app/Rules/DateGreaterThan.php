<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateGreaterThan implements Rule
{
    private $otherDate;
    private $otherDateName;

    public function __construct($otherDate, $otherDateName = 'ngày so sánh')
    {
        $this->otherDate = $otherDate;
        $this->otherDateName = $otherDateName;
    }

    public function passes($attribute, $value)
    {
        if (is_null($value) || is_null($this->otherDate)) {
            return true;
        }

        return strtotime($value) > strtotime($this->otherDate);
    }

    public function message()
    {
        return "Trường :attribute phải là ngày lớn hơn trường {$this->otherDateName}.";
    }
}
