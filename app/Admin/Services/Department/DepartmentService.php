<?php

namespace App\Admin\Services\Department;

use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use App\Admin\Traits\AuthService;
use App\Enums\ShiftDepartment\ShiftStatusEnum;
use App\Traits\UseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentService implements DepartmentServiceInterface
{
    use AuthService, UseLog;

    protected $data;

    protected $repository;
    protected $shiftDepartment;
    private AdminRepositoryInterface $adminRepository;

    public function __construct(
        DepartmentRepositoryInterface $repository,
        ShiftDepartmentRepositoryInterface $shiftDepartment,
    ) {
        $this->repository = $repository;
        $this->shiftDepartment = $shiftDepartment;
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        // $departmentData = [
        //     'name' => $data['department']['name'],
        //     'key' => $data['department']['key'],
        // ];
    
        $department = $this->repository->create($data['department']);
    
        if (isset($data['shift'])) {
            $shiftData = $data['shift'];
            foreach ($shiftData['new_title'] as $index => $title) {
                if (empty(trim($title))) {
                    continue;
                }
                
                $this->shiftDepartment->create([
                    'department_id' => $department->id,
                    'title' => $title,
                    'status' => ShiftStatusEnum::active,
                    'description' => $shiftData['new_description'][$index] ?? '', 
                ]);
            }
        }
    
        return $department;
    }

    public function update(Request $request): object|bool
    {
        $data = $request->validated();
        $shiftData = $data['shift'];
        $departmentId = $data['department']['id'];
    
        if (isset($shiftData['id'])) {
            foreach ($shiftData['id'] as $index => $item) {
                if (($shiftData['status'][$index] ?? ShiftStatusEnum::active->value) == ShiftStatusEnum::unactive->value) {
                    $this->shiftDepartment->delete($item);
                    continue;
                }
    
                $this->shiftDepartment->updateOrCreate(
                    [
                        'department_id' => $departmentId,
                        'id' => $item
                    ],
                    [
                        'title' => $shiftData['title'][$index],
                        'description' => $shiftData['description'][$index],
                        'status' => ShiftStatusEnum::active,
                    ]
                );
            }
        }
    
        if (isset($shiftData['new_title'])) {
            foreach ($shiftData['new_title'] as $index => $title) {
                $this->shiftDepartment->create([
                    'department_id' => $departmentId,
                    'title' => $title,
                    'status' => ShiftStatusEnum::active,
                    'description' => $shiftData['new_description'][$index] ?? '',
                ]);
            }
        }
    
        // return $this->repository->update($departmentId, [
        //     'name' => $data['department']['name'],
        // ]);
        return $this->repository->update($departmentId, $data['department']);
    }

    public function delete($id): object|bool
    {
        return $this->repository->delete($id);
    }
}
