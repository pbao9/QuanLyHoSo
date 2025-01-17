<div class="col-12 col-md-3">
				<div class="card mb-3">
								<div class="card-header">

												<span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
								</div>
								<div class="card-body d-flex justify-content-between p-2">
												<x-button.submit :title="__('Cập nhật')" />
												<x-button.modal-delete data-route="{{ route('admin.post.delete', $post->id) }}" :title="__('Xóa')" />
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">

												<span><i class="ti ti-category me-2"></i>{{ __('Danh mục') }}</span>
								</div>
								<div class="card-body wrap-list-checkbox p-2">
												@foreach ($categories as $category)
																<x-input-checkbox :checked="$post->categories->pluck('id')->toArray()" :depth="$category->depth" name="categories_id[]" :label="$category->name"
																				:value="$category->id" />
												@endforeach
								</div>
				</div>
				<div class="card mb-3">
								<div class="card-header">
												<span><i class="ti ti-star me-2"></i>{{ __('Nổi bật') }}</span>
								</div>
								<div class="card-body p-2">
												<input type="hidden" name="is_featured" value="{{ App\Enums\FeaturedStatus::Featureless->value }}">
												<x-input-switch name="is_featured" value="{{ App\Enums\FeaturedStatus::Featured->value }}" :label="__('Nổi bật?')"
																:checked="$post->is_featured->value == App\Enums\FeaturedStatus::Featured->value" />
								</div>
				</div>

				<div class="card mb-3">
								<div class="card-header">

												<span><i class="ti ti-toggle-right me-2"></i>{{ __('Trạng thái') }}</span>
								</div>
								<div class="card-body p-2">
												<x-select name="status" :required="true">
																@foreach ($status as $key => $value)
																				<x-select-option :option="$post->status->value" :value="$key" :title="$value" />
																@endforeach
												</x-select>
								</div>
				</div>

				<div class="card mb-3">
								<div class="card-header">

												<span><i class="ti ti-camera me-2"></i>{{ __('Ảnh đại diện') }}</span>
								</div>
								<div class="card-body p-2">
												<x-input-image-ckfinder name="image" showImage="image" :value="$post->image" />
								</div>
				</div>
</div>
