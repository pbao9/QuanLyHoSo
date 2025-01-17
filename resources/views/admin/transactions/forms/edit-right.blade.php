<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Cập nhật')" />
												<x-button.modal-delete data-route="{{ route('admin.transaction.delete', $transaction->id) }}"
																:title="__('Xóa')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-calendar me-2"></i>{{ __('Hạn thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input :value="format_date($transaction->due_date ? $transaction->due_date : '')" name="due_date" type="date" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-calendar me-2"></i>{{ __('Ngày thanh toán') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input :value="format_date($transaction->paid_at ? $transaction->paid_at : '')" name="paid_at" type="date" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-brand-mastercard me-2"></i>{{ __('Loại giao dịch') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="type" :required="true">
																@foreach ($types as $key => $value)
																				<x-select-option :option="$transaction->type" :value="$key" :title="$value" />
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
																				<x-select-option :option="$transaction->status" :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>
</div>
