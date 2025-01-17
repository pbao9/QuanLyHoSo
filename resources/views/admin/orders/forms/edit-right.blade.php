<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Cập nhật')" />
												<x-button.modal-delete data-route="{{ route('admin.order.delete', $order->id) }}" :title="__('Xóa')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-toggle-right me-2"></i>{{ __('Trạng thái') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="order[status]" :required="true">
																@foreach ($status as $key => $value)
																				<x-select-option :option="$order->status->value" :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-brand-mastercard me-2"></i>{{ __('Phương thức thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="order[payment_method]" :required="true">
																@foreach ($payment_methods as $key => $value)
																				<x-select-option :option="$order->payment_method->value" :value="$key" :title="$value" />
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
																				<x-select-option :option="$order->payment_status" :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-calendar me-2"></i>{{ __('Ngày tạo đơn hàng') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input readonly :value="format_date($order->created_at)" type="date" />
								</div>
				</div>
</div>
