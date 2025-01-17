<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Auth\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    //
    public function getView()
    {
        return [
            'index' => 'admin.auth.password.index',
            'indexUser' => 'user.auth.change-password',
        ];
    }

    public function index()
    {
        return view($this->view['index']);
    }

    public function indexUser()
    {
        $breadcrumbs = $this->crums->add(__('Đổi mật khẩu'))->getBreadcrumbs();
        return view($this->view['indexUser'], compact('breadcrumbs'));
    }

    public function update(ChangePasswordRequest $request)
    {
        $data['password'] = bcrypt($request->input('password'));

        if (auth('admin')->check()) {
            auth('admin')->user()->update($data);
        } elseif (auth('web')->check()) {
            auth('web')->user()->update($data);
        }

        return back()->with('success', __('notifySuccess'));
    }
}
