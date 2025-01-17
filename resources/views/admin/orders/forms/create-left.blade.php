<div class="col-12 col-md-9">
				<div class="card">
								<div class="card-header justify-content-between">
												<h2 class="mb-0">{{ __('Thông tin đơn hàng') }}</h2>
								</div>
								<div class="row card-body">
												<div class="col-12 col-md-6">
																<h3>{{ __('Thông tin chung') }}</h3>
																<div class="mb-3">
																				<label for=""><i class="ti ti-user"></i> {{ __('Khách hàng') }} <span
																												class="text-danger">*</span></label>
																				<x-select name="order[user_id]" id="user_id" class="select2-bs5-ajax"
																								data-url="{{ route('admin.search.select.user') }}" :required="true">
																				</x-select>
																</div>
																<div class="mb-3">
																				<label for=""><i class="ti ti-note"></i> {{ __('Ghi chú') }}:</label>
																				<textarea name="order[note]" class="form-control">{{ old('order.note') }}</textarea>
																</div>
												</div>
												<div class="col-12 col-md-6">
																<h3>{{ __('Thông tin giao hàng') }}</h3>
																<div id="infoShipping">
																				@include('admin.orders.partials.info-shipping')
																</div>
												</div>
												<div class="col-12 col-md-6 d-none" id="infoShippingOther">
																<h3>{{ __('Thông tin giao hàng khác') }}</h3>
																<div>
																				@include('admin.orders.partials.info-shipping-other')
																</div>
												</div>
												<div class="col-12">
																@include('admin.orders.partials.products')
												</div>
								</div>
				</div>
</div>

<script>
				document.getElementById('toggleShippingInfoOther').addEventListener('change', function() {
								var shippingInfoDiv = document.getElementById('infoShippingOther');
								shippingInfoDiv.classList.toggle('d-none')
				});
</script>
