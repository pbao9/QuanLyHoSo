@extends('admin.layouts.guest.master')

@section('content')
    <div class="page page-center"
        style="background: url({{ asset('/public/assets/images/background.svg') }})  no-repeat; background-size: cover; background-position: center;">
        <div class="container-tight py-4">
            <div class="card card-md bg-blur-custom rounded-4">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4 text-uppercase">{{ __('Xác thực tài khoản') }}</h1>
                    <x-form :action="route('admin.forgot-password.verifyOTP')" type="post" :validate="true">
                        <div class="mb-3">
                            <label class="form-label text-center">{{ __('Vui lòng nhập mã OTP đã được gửi đến') }}</label>
                            <label for="" class="form-label text-center text-warning">{{ $admin->email }}</label>
                            <input type="hidden" value="{{ $admin->email }}" name="email">
                            <div class="d-flex otp-group justify-content-between">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                                <input type="text" class="form-control otp-input" maxlength="1" inputmode="numeric"
                                    name="otp[]">
                            </div>
                        </div>
                        <div class="form-footer mt-2 text-center">
                            <button type="submit"
                                class="btn btn-primary w-100 text-uppercase">{{ __('Gửi xác thực') }}</button>
                        </div>
                    </x-form>
                </div>
                <div class="form-footer my-1 text-center">
                    <x-form :action="route('admin.forgot-password.resendOTP')" type="post" id="form-resend">
                        <input type="hidden" name="email" value="{{ $admin->email }}">
                        <input type="submit" class="nav-link bg-transparent border-0 mx-auto" id="btn-resend"
                            value="Gửi lại OTP" disabled />
                    </x-form>
                </div>

            </div>

        </div>
    </div>
    <script>
        let countdownTime = 60;
        let resendButton = document.getElementById("btn-resend");

        function startCountdown() {
            resendButton.disabled = true;
            resendButton.value = `Gửi lại mã sau ${countdownTime} giây...`;

            let countdownInterval = setInterval(function() {
                countdownTime--;
                resendButton.value =
                    `Gửi lại mã sau ${countdownTime} giây...`;

                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    resendButton.value = 'Gửi lại OTP';
                    resendButton.disabled = false;
                }
            }, 1000);
        }

        window.onload = function() {
            startCountdown();
        };

        document.getElementById("form-resend").onsubmit = function(e) {
            e.preventDefault();
            startCountdown();
            this.submit();
        };

        document.querySelectorAll('.otp-input').forEach(input => {
            input.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });

            input.addEventListener('keydown', (e) => {
                if (e.key >= '0' && e.key <= '9') {
                    e.target.value = '';
                }
            });

            input.addEventListener('keyup', (e) => {
                if (e.target.value.length === 1) {
                    const nextInput = e.target.nextElementSibling;
                    if (nextInput && nextInput.classList.contains('otp-input')) {
                        nextInput.focus();
                    }
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '') {
                    const previousInput = e.target.previousElementSibling;
                    if (previousInput && previousInput.classList.contains('otp-input')) {
                        previousInput.focus();
                    }
                }
            });
        });
    </script>
@endsection
