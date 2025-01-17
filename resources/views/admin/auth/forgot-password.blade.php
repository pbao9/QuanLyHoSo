@extends('admin.layouts.guest.master')

@section('content')
    <div class="page page-center"
        style="background: url({{ asset('/public/assets/images/background.svg') }})  no-repeat; background-size: cover; background-position: center;">
        <div class="container-tight py-4">
            <x-form :action="route('admin.forgot-password.handle')" class="card card-md bg-blur-custom rounded-4" type="post" :validate="true">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4 text-uppercase">{{ __('Quên mật khẩu') }}</h1>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                            </span>
                            <x-input-email type="text" value="" class="form-control"
                                placeholder="Nhập email đăng nhập" :required="true" name="email" />
                        </div>
                    </div>
                    <div class="form-footer mt-2">
                        <button type="submit" class="btn btn-primary w-100 text-uppercase">{{ __('Gửi yêu cầu') }}</button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection
