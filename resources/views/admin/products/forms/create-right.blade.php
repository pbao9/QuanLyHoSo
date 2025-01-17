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
												<span><i class="ti ti-category me-2"></i>{{ __('Danh mục') }}</span>
								</div>
								<div class="card-body wrap-list-checkbox p-2">
												@foreach ($categories as $category)
																<x-input-checkbox :depth="$category->depth" name="categories_id[]" :label="$category->name" :value="$category->id" />
												@endforeach
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-toggle-right me-2"></i>{{ __('Trạng thái') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="product[is_active]" :required="true">
																<x-select-option value="1" :title="__('Hoạt động')" />
																<x-select-option value="0" :title="__('Tạm ngưng')" />
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-star me-2"></i>{{ __('Nổi bật') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="product[is_featured]" :required="true">
																<x-select-option value="1" :title="__('Có')" />
																<x-select-option value="2" :title="__('Không')" />
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-camera me-2"></i>{{ __('Ảnh đại diện') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input-image-ckfinder name="product[avatar]" showImage="avatar" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-photo me-2"></i>{{ __('Thư viện ảnh') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input-gallery-ckfinder name="product[gallery]" type="multiple" />
								</div>
				</div>
</div>
