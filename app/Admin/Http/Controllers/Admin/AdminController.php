<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Admin\AdminRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Admin\DataTables\Admin\AdminDataTable;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    protected $departmentRepository;
    public function __construct(
        AdminRepositoryInterface $repository,
        AdminServiceInterface $service,
        DepartmentRepositoryInterface $departmentRepository,
    ) {

        parent::__construct();

        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
        $this->service = $service;
    }

    public function getView(): array
    {
        return [
            'index' => 'admin.admins.index',
            'create' => 'admin.admins.create',
            'edit' => 'admin.admins.edit'
        ];
    }

    public function getRoute(): array
    {
        return [
            'index' => 'admin.admin.index',
            'create' => 'admin.admin.create',
            'edit' => 'admin.admin.edit',
            'delete' => 'admin.admin.delete'
        ];
    }
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render($this->view['index']);
    }

    public function create(): Factory|View|Application
    {
        $roles = $this->repository->getAllRolesByGuardName('admin');
        $department = $this->departmentRepository->getAll();
        return view($this->view['create'], [
            'roles' => $roles,
            'department' => $department
        ]);
    }


    public function store(AdminRequest $request): RedirectResponse
    {

        $instance = $this->service->store($request);
        $instance->syncRoles($request->roles);

        return to_route($this->route['edit'], $instance->id);
    }

    public function edit($id): Factory|View|Application
    {

        $instance = $this->repository->findOrFail($id);
        $department = $this->departmentRepository->getAll();

        $roles = $this->repository->getAllRolesByGuardName('admin');
        return view(
            $this->view['edit'],
            [
                'admin' => $instance,
                'roles' => $roles,
                'department' => $department

            ],
        );
    }

    public function update(AdminRequest $request): RedirectResponse
    {

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));
    }

    public function delete($id): RedirectResponse
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
