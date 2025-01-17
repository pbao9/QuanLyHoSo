<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Cập nhật')" />
												<x-button.modal-delete data-route="{{ route('admin.product.delete', $product->id) }}" :title="__('Xóa')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-category me-2"></i>{{ __('Danh mục') }}</span>
								</div>
								<div class="card-body wrap-list-checkbox p-2">
												@foreach ($categories as $category)
																<x-input-checkbox :depth="$category->depth" :checked="$product->categories->pluck('id')->toArray()" name="categories_id[]" :label="$category->name"
																				:value="$category->id" />
												@endforeach
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-category me-2"></i>{{ __('Cấu hình các chương') }}</span>
								</div>
								<div class="card-body ms-3 p-2">
												<x-link :href="route('admin.product.item.index', $product->id)" :title="__('Các chương của sản phẩm')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-toggle-right me-2"></i>{{ __('Trạng thái') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select class="form-select" name="product[is_active]" :required="true">
																<x-select-option value="1" :title="__('Hoạt động')" />
																<x-select-option :option="$product->is_active ?: '0'" value="0" :title="__('Tạm ngưng')" />
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
																<x-select-option :option="$product->is_featured ?: '2'" value="2" :title="__('Không')" />
												</x-select>
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-camera me-2"></i>{{ __('Ảnh đại diện') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input-image-ckfinder name="product[avatar]" showImage="avatar" :value="$product->avatar" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-photo me-2"></i>{{ __('Thư viện ảnh') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input-gallery-ckfinder name="product[gallery]" type="multiple" :value="$product->gallery" />
								</div>
				</div>
</div>
