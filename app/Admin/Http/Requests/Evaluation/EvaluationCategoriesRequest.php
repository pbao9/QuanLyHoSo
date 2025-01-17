<?php

namespace App\Admin\Http\Requests\Evaluation;

use App\Admin\Http\Requests\BaseRequest;

class EvaluationCategoriesRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'name' => ['required'],
            'description' => ['nullable']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\EvaluationCategory,id'],
            'name' => ['required'],
            'description' => ['nullable']
        ];
    }
}
