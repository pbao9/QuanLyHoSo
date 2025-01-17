<?php

namespace App\Admin\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;

class OtpRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'email' => ['nullable'],
            'otp' => ['required', 'array', 'size:6'], // Đảm bảo 'otp' là mảng có 6 phần tử
            'otp.*' => ['required', 'numeric', 'digits:1'], // Mỗi phần tử phải là một chữ số
        ];
    }
}
