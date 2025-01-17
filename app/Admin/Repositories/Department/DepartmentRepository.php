<?php

namespace App\Admin\Repositories\Department;

use App\Admin\Repositories\EloquentRepository;
use App\Models\Department;
use App\Models\Evaluations;

class DepartmentRepository extends EloquentRepository implements DepartmentRepositoryInterface
{

    public function getModel(): string
    {
        return Department::class;
    }

    public function getSlugDepartment($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
