@extends('admin.layouts.guest.master')

@section('content')
    <div class="page page-center"
        style="background: url({{ asset('/public/assets/images/background.svg') }})  no-repeat; background-size: cover; background-position: center;">
        <div class="container-tight py-4">
            <x-form :action="route('admin.login.post')" class="card card-md bg-blur-custom rounded-4" type="post" :validate="true">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4 text-uppercase">{{ __('Đăng nhập') }}</h1>
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
                    <div class="mb-3">
                        <label class="form-label">{{ __('Mật khẩu') }}</label>
                        <div class="input-icon mb-3">

                        </div>
                        <div class="input-group input-group-flat">
                            <x-input-password value="" class="form-control" placeholder="Nhập mật khẩu đăng nhập"
                                :required="true" name="password" id="password-input" />
                            <span class="input-group-text">
                                <a href="#" class="link-secondary show-password" data-bs-toggle="tooltip"
                                    aria-label="Hiển thị mật khẩu" data-bs-original-title="Hiển thị mật khẩu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                        </path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">
                                {{ __('Ghi nhớ tài khoản') }}
                            </span>
                        </label>
                        <x-link :href="route('admin.forgot-password.index')">{{ __('Quên mật khẩu?') }}</x-link>
                    </div>
                    <div class="form-footer mt-2">
                        <button type="submit" class="btn btn-primary w-100 text-uppercase">{{ __('Đăng nhập') }}</button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPasswordButton = document.querySelector('.show-password');
            const passwordInput = document.getElementById('password-input');

            showPasswordButton.addEventListener('click', function(e) {
                e.preventDefault();
                const currentType = passwordInput.type;
                passwordInput.type = currentType === 'password' ? 'text' : 'password';
            });
        });
    </script>
@endsection
