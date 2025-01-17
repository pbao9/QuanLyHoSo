<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Đăng')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-brand-mastercard me-2"></i>{{ __('Phương thức thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="order[payment_method]" :required="true">
																@foreach ($payment_methods as $key => $value)
																				<x-select-option :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-credit-card-pay me-2"></i>{{ __('Trạng thái thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="order[payment_status]" :required="true">
																@foreach ($payment_statuses as $key => $value)
																				<x-select-option :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
</div>
