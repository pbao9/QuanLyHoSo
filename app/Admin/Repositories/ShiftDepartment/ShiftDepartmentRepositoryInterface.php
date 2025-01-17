<?php

namespace App\Admin\Repositories\ShiftDepartment;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface ShiftDepartmentRepositoryInterface extends EloquentRepositoryInterface
{
    public function updateOrCreate(array $conditions, array $values);
    public function getByDepartment($department_id);
    public function getShiftsByDepartment($department_id);
}
