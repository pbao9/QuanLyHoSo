<?php

namespace App\Admin\Services\LoggedTransaction;

use App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\LoggedTransaction\LoggedTransactionServiceInterface;
use App\Admin\Traits\AuthService;
use App\Admin\Traits\Setup;
use Illuminate\Http\Request;

class LoggedTransactionService implements LoggedTransactionServiceInterface
{
    use Setup, AuthService;
    protected $data;

    protected $repository;
    protected $userBalanceRepository;
    protected $userRepository;
    protected $adminRepository;

    public function __construct(
        LoggedTransactionRepositoryInterface $repository,
        UserRepositoryInterface $userRepository,
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        $this->data['code'] = $this->createCodePayment();
        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function actionMultipleRecode(Request $request): bool
    {
        $this->data = $request->all();
        switch ($this->data['action']) {
            case 'delete':
                foreach ($this->data['id'] as $value) {
                    $this->deletePermanently($value);
                }
                return true;
            default:
                return false;
        }
    }

    public function deletePermanently(int $id): object|bool
    {
        return $this->repository->delete($id);
    }
}
