<?php

namespace App\Admin\Http\Requests\Evaluation;

use App\Admin\Http\Requests\BaseRequest;

class EvaluationCriteriaRequest extends BaseRequest
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
            'category_id' => ['required'],
            'description' => ['nullable']
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
            'id' => ['required', 'exists:App\Models\EvaluationCriteria,id'],
            'name' => ['required'],
            'category_id' => ['required', 'exists:App\Models\EvaluationCategory,id'],
            'description' => ['nullable']
        ];
    }
}
