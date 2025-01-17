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
												{{ __('Trạng thái') }}
								</div>
								<div class="card-body p-2">
												<x-select name="status" :required="true">
																@foreach ($status as $key => $value)
																				<x-select-option :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
</div>
