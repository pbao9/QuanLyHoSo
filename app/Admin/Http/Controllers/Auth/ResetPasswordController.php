<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Auth\ForgotPasswordRequest;
use App\Admin\Http\Requests\Auth\OtpRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Mail\ResetPasswordMail;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;

class ResetPasswordController extends Controller
{
    protected $repository;
    protected $service;
    protected $view = [];
    protected $route = [];

    public function __construct(
        AdminRepositoryInterface $repository,
        AuthServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
        $this->view = $this->getView();
        $this->route = $this->getRoute();
    }

    public function getView()
    {
        return [
            'index' => 'admin.auth.forgot-password',
            'edit' => 'admin.auth.update-password',
            'otpConfirm' => 'admin.auth.otp-confirm',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.forgot-password.index',
            'edit' => 'admin.forgot-password.resetPassword',
            'login' => 'admin.login.index',
            'verify' => 'admin.forgot-password.verifyOtp',
            'otp' => 'admin.forgot-password.otpConfirm'
        ];
    }

    public function index()
    {
        return view($this->view['index']);
    }

    public function handle(ForgotPasswordRequest $request)
    {
        $otp = rand(100000, 999999);

        $admin = $this->repository->findByField('email', $request->email, []);
        // dd($admin);
        if (!$admin) {
            return back()->with(['error' => __('Không tìm thấy email')]);
        }

        $admin->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);


        session(['otp_admin_id' => $admin->id]);

        try {
            Mail::to($admin->email)->send(new ResetPasswordMail($admin, $otp));
        } catch (\Exception $e) {
            return back()->with('error', __('Không thể gửi OTP. Vui lòng thử lại sau.'));
        }


        return redirect()->route($this->route['otp'])->with('success', __('notifyOtpSuccess'));
    }

    public function otpConfirm(OtpRequest $request)
    {
        $adminId = session('otp_admin_id');
        $admin = $this->repository->find($adminId);

        if ($admin) {
            return view($this->view['otpConfirm'], ['admin' => $admin]);
        }

        return to_route($this->route['index'])->with('error', __('Không tìm thấy thông tin Người dùng.'));
    }

    public function verifyOTP(OtpRequest $request)
    {
        $otp = implode('', $request->otp);
        $admin = $this->repository->findByField('email', $request->email, []);

        if (!$admin) {
            return back()->with('error', __('Không tìm thấy thông tin Người dùng.'));
        }

        if (!$admin->otp_expires_at || $admin->otp_expires_at->isPast()) {
            return back()->with('error', __('OTP đã hết hạn. Vui lòng thử lại.'));
        }

        if ($admin->otp !== $otp) {
            return back()->with('error', __('OTP không đúng. Vui lòng thử lại.'));
        }


        return to_route($this->route['edit'])->with('success', __('Xác thực OTP thành công. Bạn có thể thay đổi mật khẩu.'));
    }



    public function resetPassword()
    {
        $adminId = session('otp_admin_id');

        $admin = $this->repository->find($adminId);
        if (!$admin) {
            return redirect()->route($this->route['index'])->with('error', __('Không tìm thấy thông tin Người dùng.'));
        }

        return view($this->view['edit'], ['admin' => $admin]);
    }

    public function update(ForgotPasswordRequest $request)
    {
        $admin = $this->repository->find($request->id);

        if (!$admin) {
            return redirect()->route($this->route['index'])->with('error', __('Không tìm thấy thông tin Người dùng.'));
        }

        $this->service->updatePassword($request);

        return to_route($this->route['login'])->with('success', __('Thay đổi mật khẩu thành công'));
    }


    public function resendOtp(Request $request)
    {
        // Kiểm tra nếu session đã có admin_id
        $adminId = session('otp_admin_id');

        if (!$adminId) {
            return redirect()->route('forgot-password')->with('error', __('Session đã hết hạn.'));
        }

        $admin = $this->repository->find($adminId);

        if (!$admin) {
            return back()->with('error', __('Không tìm thấy tài khoản'));
        }

        // Tạo lại OTP
        $otp = rand(100000, 999999);
        $admin->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5), // Set lại thời gian hết hạn cho OTP
        ]);

        try {
            // Gửi lại OTP qua email
            Mail::to($admin->email)->send(new ResetPasswordMail($admin, $otp));
        } catch (\Exception $e) {
            return back()->with('error', __('Không thể gửi OTP. Vui lòng thử lại sau.'));
        }

        return back()->with('success', __('OTP đã được gửi lại thành công.'));
    }
}
