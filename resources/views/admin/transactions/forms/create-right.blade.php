<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body p-2">
												<x-button.submit :title="__('Thêm')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-calendar me-2"></i>{{ __('Hạn thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input name="due_date" type="date" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-calendar me-2"></i>{{ __('Ngày thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input name="paid_at" type="date" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-brand-mastercard me-2"></i>{{ __('Loại giao dịch') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="type" :required="true">
																@foreach ($types as $key => $value)
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
												<x-select class="form-select" name="status" :required="true">
																@foreach ($status as $key => $value)
																				<x-select-option :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
</div>
