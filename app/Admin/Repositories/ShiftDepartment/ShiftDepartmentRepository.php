<?php

namespace App\Admin\Repositories\ShiftDepartment;

use App\Admin\Repositories\EloquentRepository;
use App\Models\Department;
use App\Models\DepartmentShift;
use App\Models\Evaluations;

class ShiftDepartmentRepository extends EloquentRepository implements ShiftDepartmentRepositoryInterface
{

    public function getModel(): string
    {
        return DepartmentShift::class;
    }

    public function updateOrCreate(array $conditions, array $values)
    {
        return $this->model->updateOrCreate($conditions, $values);
    }

    public function getByDepartment($department_id)
    {
        return $this->model->where('department_id', '=', $department_id)
            ->where('status', '=', )->get();
    }

    public function getShiftsByDepartment($department_id)
    {
        return $this->model->where('department_id','=', $department_id)->get();
    }
}
