<div class="col-12 col-md-9">
				<div class="card mb-3">
								<div class="card-header justify-content-center">
												<h2 class="mb-0">{{ __('Thông tin giao dịch') }}</h2>
								</div>
								<div class="row card-body">
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-user"></i> {{ __('Người dùng') }}: <span
																												class="text-danger">*</span></label>
																				<x-select name="user_id" id="user_id" class="select2-bs5-ajax"
																								data-url="{{ route('admin.search.select.user') }}" :required="true">
																				</x-select>
																</div>
												</div>
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-truck-delivery"></i> {{ __('Đơn hàng') }}: <span
																												class="text-danger">*</span></label>
																				<x-select name="order_id" id="order_id" class="select2-bs5-ajax"
																								data-url="{{ route('admin.search.select.user') }}" :required="true">
																				</x-select>
																</div>
												</div>
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-currency-dollar"></i> {{ __('Số tiền') }}: <span
																												class="text-danger">*</span></label>
																				<x-input-price id="amount" name="amount" :value="$transaction->amount ?? old('amount', 0)" :placeholder="__('Số tiền')" />
																</div>
												</div>
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-clipboard-text"></i> {{ __('Mô tả giao dịch') }}: <span
																												class="text-danger">*</span></label>
																				<textarea class="form-control" name="description"></textarea>
																</div>
												</div>
								</div>
				</div>
</div>
