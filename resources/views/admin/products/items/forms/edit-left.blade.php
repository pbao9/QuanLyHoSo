<div class="col-12 col-md-9">
				<div class="card">
								<div class="card-header justify-content-center">
												<h2 class="mb-0">{{ __('Thông tin nội dung sách') }} - <x-link class="text-primary" :href="route('admin.product.edit', optional($productItem->product)->id)"
																				:title="optional($productItem->product)->name" /></h2>
								</div>
								<div class="row card-body">
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-clipboard-text"></i> {{ __('Chương số') }}: <span
																												class="text-danger">*</span></label>
																				<x-input type="number" name="chapter" :value="$productItem->chapter" :required="true"
																								placeholder="{{ __('Ví dụ: 1') }}" />
																</div>
												</div>
												<span class="text-danger">LƯU Ý: Nếu bạn upload file mới dữ liệu truyện cũ sẽ bị ghi đè</span>
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-clipboard-plus"></i> {{ __('File truyện') }}: <span
																												class="text-danger">*</span></label>
																				<x-input type="file" name="file" accept="application/pdf"
																								placeholder="{{ __('Ví dụ: Tham-tu-lung-danh.pdf') }}" />
																</div>
												</div>
												<div class="row mb-3">
																<label class="col-5 col-form-label"
																				for="">{{ __('Giá bán thường') . ' (' . config('custom.currency') . ')' }} <span
																								class="text-danger">*</span></label>
																<div class="col">
																				<x-input-price id="price" name="price" :value="$productItem->price" :placeholder="__('Giá bán thường')" />
																</div>
												</div>
												<div class="row mb-3">
																<label class="col-5 col-form-label"
																				for="">{{ __('Giá khuyến mãi') . ' (' . config('custom.currency') . ')' }} <span
																								class="text-danger">*</span></label>
																<div class="col">
																				<x-input-price id="promotion_price" name="promotion_price" :value="$productItem->promotion_price" :placeholder="__('Giá khuyến mãi')" />
																</div>
												</div>
								</div>
				</div>
</div>
