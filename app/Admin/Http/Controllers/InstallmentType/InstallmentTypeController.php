<?php

namespace App\Admin\Http\Controllers\InstallmentType;

use App\Admin\DataTables\InstallmentType\InstallmentTypeDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\InstallmentType\InstallmentTypeRepositoryInterface;
use App\Admin\Services\InstallmentType\InstallmentTypeServiceInterface;
use App\Admin\Http\Requests\InstallmentType\InstallmentTypeRequest;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Enums\Order\PaymentStatus;
use App\Enums\Payment\PaymentType;
use App\Traits\ResponseController;

class InstallmentTypeController extends Controller
{
    public function __construct(
        InstallmentTypeRepositoryInterface $repository,
        InstallmentTypeServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.installment_types.index',
            'edit' => 'admin.installment_types.edit',
            'create' => 'admin.installment_types.create',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.installment-type.index',
            'edit' => 'admin.installment-type.edit',
            'delete' => 'admin.installment-type.delete',
        ];
    }

    public function index(InstallmentTypeDataTable $dataTable)
    {
        return $dataTable->render(
            $this->view['index'],
        );
    }

    public function edit($id)
    {
        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'instance' => $instance,
            ],
        );
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }

    public function create()
    {
        return view($this->view['create'], []);
    }

    public function store(InstallmentTypeRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function update(InstallmentTypeRequest $request)
    {

        $response = $this->service->update($request);

        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }
}
