<?php

namespace App\Admin\Http\Controllers\LoggedTransaction;

use App\Admin\DataTables\LoggedTransaction\LoggedTransactionDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepositoryInterface;
use App\Admin\Services\LoggedTransaction\LoggedTransactionServiceInterface;
use App\Admin\Http\Requests\LoggedTransaction\LoggedTransactionRequest;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Enums\Order\PaymentStatus;
use App\Enums\Payment\PaymentType;
use App\Traits\ResponseController;
use Illuminate\Http\Request;

class LoggedTransactionController extends Controller
{
    use ResponseController;
    private $userRepository;
    public function __construct(
        LoggedTransactionRepositoryInterface $repository,
        UserRepositoryInterface $userRepository,
        LoggedTransactionServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;
        $this->userRepository = $userRepository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.transactions.index',
            'edit' => 'admin.transactions.edit',
            'create' => 'admin.transactions.create',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.transaction.index',
            'edit' => 'admin.transaction.edit',
            'delete' => 'admin.transaction.delete',
        ];
    }
    protected function getActionMultiple(): array
    {
        return [
            'delete' => __('Xoá vĩnh viễn')
        ];
    }

    public function index(LoggedTransactionDataTable $dataTable)
    {
        $actionMultiple = $this->getActionMultiple();
        return $dataTable->render(
            $this->view['index'],
            ['actionMultiple' => $actionMultiple]
        );
    }

    public function edit($id)
    {
        $transaction = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'transaction' => $transaction,
                'status' => PaymentStatus::asSelectArray(),
                'types' => PaymentType::asSelectArray(),
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
        return view($this->view['create'], [
            'status' => PaymentStatus::asSelectArray(),
            'types' => PaymentType::asSelectArray(),
        ]);
    }

    public function store(LoggedTransactionRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function update(LoggedTransactionRequest $request)
    {

        $response = $this->service->update($request);

        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function actionMultipleRecode(Request $request)
    {
        $boolean = $this->service->actionMultipleRecode($request);
        if ($boolean) {
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }
}
