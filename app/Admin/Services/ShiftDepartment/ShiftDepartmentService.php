<?php

namespace App\Admin\Services\ShiftDepartment;

use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use App\Traits\UseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftDepartmentService implements ShiftDepartmentServiceInterface
{
    use UseLog;

    protected $data;

    protected $repository;

    public function __construct(
        ShiftDepartmentRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $data = $request->validated();
            $department = $this->repository->create($data);
            DB::commit();
            return $department;
        } catch (Exception $e) {
            DB::rollback();
            $this->logError('Failed to process create user', $e);
            return false;
        }
    }

    public function update(Request $request): object|bool
    {

        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id): object|bool
    {
        return $this->repository->delete($id);
    }
}
