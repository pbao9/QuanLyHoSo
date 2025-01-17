@extends('admin.layouts.guest.master')

@section('content')
				<div class="page page-center">
								<div class="container-tight py-4">
												<div class="mb-4 text-center">
																<img src="{{ asset(config('custom.images.logo')) }}" width="200" alt="">
												</div>
												<x-form :action="route('password.reset.update')" class="card card-md" type="put" :validate="true">
																<x-input type="hidden" name="token" :value="$token" />
																<x-input type="hidden" name="code" :value="$code" />
																<div class="card-body">
																				<h2 class="card-title mb-4 text-center">{{ __('Đặt lại mật khẩu') }}</h2>
																				<div class="mb-3">
																								<label class="control-label"><i class="ti ti-key"></i> {{ __('Mật khẩu mới') }}: <span
																																class="text-danger">*</span></label>
																								<x-input-password name="password" :required="true" :placeholder="__('Mật khẩu mới')" />
																				</div>
																				<div class="mb-3">
																								<label class="control-label"><i class="ti ti-key"></i> {{ __('Nhập lại mật khẩu') }}: <span
																																class="text-danger">*</span></label>
																								<x-input-password name="password_confirmation" :required="true" :placeholder="__('Nhập lại mật khẩu')"
																												data-parsley-equalto="input[name='password']"
																												data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
																				</div>
																				<div class="form-footer">
																								<button type="submit" class="btn btn-primary w-100">{{ __('Lấy lại mật khẩu') }}</button>
																				</div>
																</div>
												</x-form>
								</div>
				</div>
@endsection
