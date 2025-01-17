<?php

namespace App\Admin\Http\Requests\Department;

use App\Admin\Http\Requests\BaseRequest;

class DepartmentRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'department.name' => ['required'],
            'department.key' => ['required'],
            'shift.title' => ['nullable'],
            'shift.new_title' => ['nullable'],
            'shift.description' => ['nullable'],
            'shift.new_description' => ['nullable']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            'department.id' => ['required', 'exists:App\Models\Department,id'],
            'department.name' => ['required'],
            'department.key' => ['required'],
            'shift.id' => ['nullable'],
            'shift.title' => ['nullable'],
            'shift.new_title' => ['nullable'],
            'shift.description' => ['nullable'],
            'shift.new_description' => ['nullable'],
            'shift.status' => ['nullable']
        ];
    }
}
