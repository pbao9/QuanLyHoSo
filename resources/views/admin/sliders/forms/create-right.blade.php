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
												<i class="ti ti-toggle-right"></i>
												<span class="ms-2">@lang('status')</span>
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
