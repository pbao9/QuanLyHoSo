<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<div class="d-flex align-items-center h-100 gap-2">
																<x-button.submit :title="__('Lưu')" name="submitter" value="save" />
												</div>
												<x-button.modal-delete data-route="{{ route('admin.notification.delete', $notification->id) }}"
																:title="__('Xóa')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-toggle-right me-2"></i>{{ __('Trạng thái') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select name="status" :required="true">
																@foreach ($status as $key => $value)
																				<x-select-option :option="$notification->status->value" :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>

</div>
