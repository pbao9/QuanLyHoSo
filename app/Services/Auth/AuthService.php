<?php

namespace App\Services\Auth;

use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class AuthService implements AuthServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(
        AdminRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function updatePassword(Request $request)
    {

        $this->data = $request->validated();
        $admin = $this->repository->findByField('otp', $this->data['otp'], []);
        if (!$admin || $admin->otp_expires_at < now()) {
            return back()->with('error', __('OTP không hợp lệ hoặc đã hết hạn.'));
        }

        $password = bcrypt($this->data['password']);

        return $this->repository->updateObject($admin, [
            'password' => $password,
            'otp' => null,
            'otp_expires_at' => null,
        ]);
    }
}
