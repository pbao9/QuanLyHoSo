<?php

namespace App\Admin\Http\Requests\LoggedTransaction;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Order\PaymentStatus;
use App\Enums\Payment\PaymentType;
use Illuminate\Validation\Rules\Enum;

class LoggedTransactionRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'amount' => ['required', 'numeric'],
            'due_date' => ['required'],
            'paid_at' => ['nullable'],
            'description' => ['required'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'order_id' => ['required', 'exists:App\Models\Order,id'],
            'status' => ['required', new Enum(PaymentStatus::class)],
            'type' => ['required', new Enum(PaymentType::class)]
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\LoggedTransaction,id'],
            'amount' => ['required', 'numeric'],
            'due_date' => ['required'],
            'paid_at' => ['nullable'],
            'description' => ['required'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'order_id' => ['required', 'exists:App\Models\Order,id'],
            'status' => ['required', new Enum(PaymentStatus::class)],
            'type' => ['required', new Enum(PaymentType::class)]
        ];
    }
}
