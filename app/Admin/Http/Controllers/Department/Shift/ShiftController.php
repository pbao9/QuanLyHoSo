<?php

namespace App\Admin\Http\Controllers\Department\Shift;

use App\Admin\DataTables\ShiftDepartment\ShiftDepartmentDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use App\Traits\ResponseController;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    use ResponseController;

    protected $departmentRepository;
    public function __construct(
        ShiftDepartmentRepositoryInterface $repository,
        DepartmentRepositoryInterface $departmentRepository,
        // DepartmentServiceInterface $service,
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
        // $this->service = $service;x`
    }

    public function getView()
    {
        return [
            'index' => 'admin.shift.index',
            'edit' => 'admin.shift.edit',
            'create' => 'admin.shift.create',

        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.department.shifts.index',
            'create' => 'admin.department.shifts.create',
            'edit' => 'admin.department.shifts.edit',
            'indexDepartment' => 'admin.department.index'

        ];
    }


    public function index($departmentID, ShiftDepartmentDataTable $dataTable)
    {
        $department = $this->departmentRepository->findOrFail($departmentID);
        return $dataTable->render($this->view['index'], [
            'department' => $department,
            'breadcrumbs' => $this->crums->add(__('department'), route($this->route['index'], ['department_id' => $department]))->add(__('Ca làm việc')),
        ]);
    }


    public function create($departmentId)
    {
        $department = $this->departmentRepository->findOrFail($departmentId);
        return view($this->view['create'], [
            'department' => $department,
            'breadcrumbs' => $this->crums
                ->add(__('department'), route($this->route['indexDepartment']))
                ->add(__('Ca làm việc'), route($this->route['index'], ['department_id' => $department]))
                ->add(__('addDepartmentShift')),

        ]);
    }

    // public function store(DepartmentRequest $request): RedirectResponse
    // {
    //     $response = $this->service->store($request);
    //     return $this->handleResponse($response, $request, $this->route['index'], $this->route['edit']);
    // }

    // public function edit($id)
    // {
    //     $instance = $this->repository->findOrFail($id);

    //     return view(
    //         $this->view['edit'],
    //         [
    //             'department' => $instance,
    //             'breadcrumbs' => $this->crums->add(__('department'), route($this->route['index']))->add(__('editDepartment')),
    //         ],
    //     );
    // }

    // public function update(DepartmentRequest $request)
    // {
    //     $response = $this->service->update($request);
    //     return $this->handleUpdateResponse($response, $this->route['edit']);
    // }

    // public function delete($id)
    // {
    //     $this->service->delete($id);

    //     return to_route($this->route['index'])->with('success', __('notifySuccess'));
    // }
}
