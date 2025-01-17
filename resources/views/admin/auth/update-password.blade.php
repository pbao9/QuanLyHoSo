@extends('admin.layouts.guest.master')

@section('content')
    <div class="page page-center"
        style="background: url({{ asset('/public/assets/images/background.svg') }})  no-repeat; background-size: cover; background-position: center;">
        <div class="container-tight py-4">
            <x-form :action="route('admin.forgot-password.update')" class="card card-md bg-blur-custom rounded-4" type="put"
                enctype="multipart/form-data">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4 text-uppercase">{{ __('Đặt lại mật khẩu') }}</h1>
                    <div class="mb-3">
                        <input type="hidden" value="{{ $admin->id }}" name="id">
                        <input type="hidden" value="{{ $admin->otp }}" name="otp">
                        <input type="hidden" value="{{ $admin->email }}" name="email">
                        <label class="form-label">{{ __('Mật khẩu mới') }}</label>
                        <div class="input-group input-group-flat">
                            <x-input-password value="" class="form-control" placeholder="Nhập mật khẩu đăng nhập"
                                :required="true" name="password" id="new-password-input" />
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

                    <div class="mb-3">
                        <label class="form-label">{{ __('Xác nhận lại mật khẩu') }}</label>
                        <div class="input-group input-group-flat">
                            <x-input-password value="" class="form-control" placeholder="Xác nhận lại mật khẩu"
                                :required="true" name="password_confirmation" id="confirm-password-input" />
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

                    <div class="form-footer mt-2">
                        <x-button.submit :title="__('Đổi mật khẩu')" class="w-100" />
                    </div>
                </div>
            </x-form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPasswordButtons = document.querySelectorAll('.show-password');

            showPasswordButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const input = button.closest('.input-group').querySelector('input');
                    const currentType = input.type;
                    input.type = currentType === 'password' ? 'text' :
                        'password';
                });
            });
        });
    </script>
@endsection
