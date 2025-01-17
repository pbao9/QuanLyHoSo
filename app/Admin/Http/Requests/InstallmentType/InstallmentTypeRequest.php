<?php

namespace App\Admin\Http\Requests\InstallmentType;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Order\PaymentStatus;
use Illuminate\Validation\Rules\Enum;

class InstallmentTypeRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'name' => ['required'],
            'duration_months' => ['required'],
            'monthly_percentage' => ['required'],
            'description' => ['required'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\InstallmentType,id'],
            'name' => ['required'],
            'duration_months' => ['required'],
            'monthly_percentage' => ['required'],
            'description' => ['required'],
        ];
    }
}
