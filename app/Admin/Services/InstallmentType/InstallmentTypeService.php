<?php

namespace App\Admin\Services\InstallmentType;

use App\Admin\Repositories\InstallmentType\InstallmentTypeRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\InstallmentType\InstallmentTypeServiceInterface;
use App\Admin\Traits\AuthService;
use App\Admin\Traits\Setup;
use Illuminate\Http\Request;

class InstallmentTypeService implements InstallmentTypeServiceInterface
{
    use Setup, AuthService;
    protected $data;

    protected $repository;
    protected $userBalanceRepository;
    protected $userRepository;
    protected $adminRepository;

    public function __construct(
        InstallmentTypeRepositoryInterface $repository,
        UserRepositoryInterface $userRepository,
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
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
}
