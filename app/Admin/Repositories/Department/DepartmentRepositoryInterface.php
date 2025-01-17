<?php

namespace App\Admin\Repositories\Department;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface DepartmentRepositoryInterface extends EloquentRepositoryInterface {
    public function getSlugDepartment($id);
}
