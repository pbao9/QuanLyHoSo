<div class="col-12 col-md-9">
				<div class="card">
								<div class="card-header justify-content-between">
												<h2 class="mb-0">{{ __('Thông tin giao dịch #:id', ['id' => $transaction->id]) }}</h2>
								</div>
								<div class="row card-body">
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-user"></i> {{ __('Người dùng') }}: <span
																												class="text-danger">*</span></label>
																				<x-select name="user_id" id="user_id" class="select2-bs5-ajax"
																								data-url="{{ route('admin.search.select.user') }}" :required="true">
																								<x-select-option :option="$transaction->user_id" :value="$transaction->user_id" :title="$transaction->user->fullname" />
																				</x-select>
																</div>
												</div>
												<div class="col-12">
																<div class="mb-3">
																				<label class="control-label"><i class="ti ti-truck-delivery"></i> {{ __('Đơn hàng') }}: <span
																												class="text-danger">*</span></label>
																				<x-select name="order_id" id="order_id" class="select2-bs5-ajax"
																								data-url="{{ route('admin.search.select.user') }}" :required="true">
																								<x-select-option :option="$transaction->order_id" :value="$transaction->order_id" :title="'Hóa đơn #' .
																								    $transaction->order->id .
																								    ' | Trị giá: ' .
																								    $transaction->order->total .
																								    ' | Ngày đặt: ' .
																								    format_date($transaction->order->created_at, 'd-m-Y')" />
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
																				<textarea class="form-control" name="description">{{ $transaction->description }}</textarea>
																</div>
												</div>
								</div>
				</div>
</div>
