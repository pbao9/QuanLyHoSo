<div class="col-12 col-md-9">
				<div class="card">
								<div class="card-header justify-content-center">
												<h2 class="mb-0">{{ __('Thông tin Admin') }}</h2>
								</div>
								<div class="row card-body">
												<!-- Email Address -->
												<div class="col-md-6 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-mail"></i> {{ __('Email') }}: <span
																												class="text-danger">*</span></label>
																				<x-input-email name="email" :value="old('email')" :required="true" />
																</div>
												</div>
												<!-- Fullname -->
												<div class="col-md-6 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-user-edit"></i> {{ __('Họ và tên') }}: <span
																												class="text-danger">*</span></label>
																				<x-input name="fullname" :value="old('fullname')" :required="true" placeholder="{{ __('Họ và tên') }}" />
																</div>
												</div>
												<!-- new password -->
												<div class="col-md-6 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-square-key"></i> {{ __('Mật khẩu') }}: <span
																												class="text-danger">*</span></label>
																				<x-input-password name="password" :required="true" />
																</div>
												</div>
												<!-- new password confirmation-->
												<div class="col-md-6 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-square-key"></i> {{ __('Xác nhận mật khẩu') }}: <span
																												class="text-danger">*</span></label>
																				<x-input-password name="password_confirmation" :required="true"
																								data-parsley-equalto="input[name='password']"
																								data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
																</div>
												</div>
												<div class="col-md-6 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-phone"></i> {{ __('Số điện thoại') }}: <span
																												class="text-danger">*</span></label>
																				<x-input-phone name="phone" :value="old('phone')" :required="true" />
																</div>
												</div>

								</div>

								<!-- Role -->
								<div class="row card-body">
												<div class="col-md-12 col-sm-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-user-check"></i> {{ __('Vai trò') }}:</label>
																				<div class="row">
																								@foreach ($roles as $role)
																												<div class="col-4">
																																<input name="roles[]" value="{{ $role->name }}" type="checkbox" />
																																{{ $role->title }}
																												</div>
																								@endforeach
																				</div>
																</div>
												</div>
								</div>

				</div>
</div>
