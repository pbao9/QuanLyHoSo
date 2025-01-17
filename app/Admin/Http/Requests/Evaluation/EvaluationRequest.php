<?php

namespace App\Admin\Http\Requests\Evaluation;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Evaluation\EvaluationShift;
use App\Enums\Evaluation\EvaluationType;
use Illuminate\Validation\Rules\Enum;

class EvaluationRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'evaluation.admin_id' => ['required', 'exists:App\Models\Admin,id'],
            'evaluation.department_id' => ['required', 'exists:App\Models\Department,id'],
            'evaluation.shift_id' => ['nullable', 'exists:App\Models\DepartmentShift,id'],
            'evaluation.supervisor' => ['nullable'],
            'evaluation.total_nurses' => ['nullable'],
            'evaluation.direct_care_nurses' => ['nullable'],
            'evaluation.administrative_nurses' => ['nullable'],
            'evaluation.procedure_room_nurses' => ['nullable'],
            'evaluation.clinic_nurses' => ['nullable'],
            'evaluation.shift_nurses' => ['nullable'],
            'evaluation.leave_nurses' => ['nullable'],
            'evaluation.total_beds' => ['nullable'],
            'evaluation.total_patients' => ['nullable'],
            'evaluation.admitted' => ['nullable'],
            'evaluation.patients_transferred_discharged' => ['nullable'],
            'evaluation.critical_patients_home' => ['nullable'],
            'evaluation.patient_deaths' => ['nullable'],
            'evaluation.triage_I_patients' => ['nullable'],
            'evaluation.triage_II_patients' => ['nullable'],
            'evaluation.admitted_patients' => ['nullable'],
            'evaluation.critical_transfers' => ['nullable'],
            'evaluation.level_1_patients' => ['nullable'],
            'evaluation.level_2_patients' => ['nullable'],
            'evaluation.level_3_patients' => ['nullable'],
            'evaluation.scheduled_surgeries' => ['nullable'],
            'evaluation.emergency_surgeries' => ['nullable'],
            'evaluation_criteria' => ['required', 'array'],
            'evaluation_criteria.*.id' => ['required', 'exists:App\Models\EvaluationCriteria,id'],
            'evaluation_criteria.*.status' => ['required', 'integer', 'in:0,1,2'],
        ];
    }
    public function messages()
    {
        return [
            'evaluation_criteria.*.status.required' => 'Nội dung đánh giá là bắt buộc',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    protected function methodPut()
    {
        return [
            'evaluation.id' => ['required', 'exists:App\Models\Evaluations,id'],
            'evaluation.admin_id' => ['required', 'exists:App\Models\Admin,id'],
            'evaluation.department_id' => ['required', 'exists:App\Models\Department,id'],
            'evaluation.shift_id' => ['nullable', 'exists:App\Models\DepartmentShift,id'],
            'evaluation.supervisor' => ['nullable'],
            'evaluation.total_nurses' => ['nullable'],
            'evaluation.direct_care_nurses' => ['nullable'],
            'evaluation.administrative_nurses' => ['nullable'],
            'evaluation.procedure_room_nurses' => ['nullable'],
            'evaluation.clinic_nurses' => ['nullable'],
            'evaluation.shift_nurses' => ['nullable'],
            'evaluation.leave_nurses' => ['nullable'],
            'evaluation.total_beds' => ['nullable'],
            'evaluation.total_patients' => ['nullable'],
            'evaluation.admitted' => ['nullable'],
            'evaluation.patients_transferred_discharged' => ['nullable'],
            'evaluation.critical_patients_home' => ['nullable'],
            'evaluation.patient_deaths' => ['nullable'],
            'evaluation.triage_I_patients' => ['nullable'],
            'evaluation.triage_II_patients' => ['nullable'],
            'evaluation.admitted_patients' => ['nullable'],
            'evaluation.critical_transfers' => ['nullable'],
            'evaluation.level_1_patients' => ['nullable'],
            'evaluation.level_2_patients' => ['nullable'],
            'evaluation.level_3_patients' => ['nullable'],
            'evaluation.scheduled_surgeries' => ['nullable'],
            'evaluation.emergency_surgeries' => ['nullable'],
            'evaluation_criteria' => ['required', 'array'],
            'evaluation_criteria.*.id' => ['required', 'exists:App\Models\EvaluationCriteria,id'],
            'evaluation_criteria.*.status' => ['required', 'integer', 'in:0,1,2'],
        ];
    }
}
