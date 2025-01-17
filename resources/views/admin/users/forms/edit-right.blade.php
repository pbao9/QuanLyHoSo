<div class="col-12 col-md-3">
				<div class="card">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Cập nhật')" />
												<x-button.modal-delete data-route="{{ route('admin.user.delete', $user->id) }}" :title="__('Xóa')" />
								</div>
				</div>
				<!-- avatar -->
				<div class="col-12">
								<div class="card mb-3">
												<div class="card-header">
																<span><i class="ti ti-camera me-2"></i>{{ __('Ảnh đại diện') }}</span>
												</div>
												<div class="card-body p-2">
																<x-input-image-ckfinder name="avatar" showImage="avatar" class="img-fluid" :value="$user->avatar" />
												</div>
								</div>
				</div>
</div>
