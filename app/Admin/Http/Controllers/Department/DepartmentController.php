<?php

namespace App\Admin\Http\Controllers\Department;

use App\Admin\DataTables\Department\DepartmentDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Department\DepartmentRequest;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use App\Admin\Services\Department\DepartmentServiceInterface;
use App\Traits\ResponseController;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    use ResponseController;
    protected $shiftRepository;
    public function __construct(
        DepartmentRepositoryInterface $repository,
        DepartmentServiceInterface $service,
        ShiftDepartmentRepositoryInterface $shiftRepository,
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->shiftRepository = $shiftRepository;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.department.index',
            'edit' => 'admin.department.edit',
            'create' => 'admin.department.create',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.department.index',
            'create' => 'admin.department.create',
            'edit' => 'admin.department.edit',

        ];
    }

    public function getDepartment($id)
    {
        $department = $this->repository->getSlugDepartment($id);
        return response()->json($department);
    }


    public function index(DepartmentDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], [
            'breadcrumbs' => $this->crums->add(__('department'), route($this->route['index'])),
        ]);
    }


    public function create()
    {
        return view($this->view['create'], [
            'breadcrumbs' => $this->crums->add(__('department'), route($this->route['index']))->add(__('addDepartment')),

        ]);
    }

    public function store(DepartmentRequest $request): RedirectResponse
    {
        $response = $this->service->store($request);
        return $this->handleResponse($response, $request, $this->route['index'], $this->route['edit']);
    }

    public function edit($id)
    {
        $instance = $this->repository->findOrFail($id);
        $shift = $this->shiftRepository->getByDepartment($id);
        return view(
            $this->view['edit'],
            [
                'department' => $instance,
                'shift' => $shift,
                'breadcrumbs' => $this->crums->add(__('department'), route($this->route['index']))->add(__('editDepartment')),
            ],
        );
    }

    public function update(DepartmentRequest $request)
    {
        // dd($request);
        $response = $this->service->update($request);
        return $this->handleUpdateResponse($response, $this->route['edit']);
    }

    public function delete($id)
    {
        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
    // Lấy ca làm việc theo khoa
    public function shifts()
    {
        return 'hehe';
    }
}
