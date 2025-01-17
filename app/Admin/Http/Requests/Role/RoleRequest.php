<?php

namespace App\Admin\Http\Requests\Role;

use App\Admin\Http\Requests\BaseRequest;

class RoleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost(): array
    {
        return [
            'title' => ['required', 'string'],
            'name' => ['required', 'string'],
            'guard_name' => ['required', 'string'],
        ];
    }

    protected function methodPut(): array
    {
        return [
            'id' => ['required', 'exists:App\Models\Role,id'],
            'title' => ['required', 'string'],
//            'name' => ['required', 'string'],
			'guard_name' => ['required', 'string'],
        ];
    }
}
