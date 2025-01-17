<?php

namespace App\Admin\Http\Requests\Auth;

use App\Admin\Http\Requests\BaseRequest;

class ForgotPasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [
            'email' => 'nullable|email',
        ];
    }

    protected function methodPost()
    {
        return [
            'email' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required'],
            'otp' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
