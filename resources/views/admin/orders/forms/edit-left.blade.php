<div class="col-12 col-md-9">
				<div class="card">
								<div class="card-header justify-content-between">
												<h2 class="mb-0">{{ __('Thông tin đơn hàng') . ' #' . $order->code }}</h2>
								</div>
								<x-input type="hidden" :value="$order->user_id" id="orderUserId" />
								<x-input type="hidden" name="order[surcharge]" :value="$order->surcharge" />
								<div class="row card-body">
												<div class="col-12 col-md-6">
																<h3>{{ __('Thông tin chung') }}</h3>
																@if ($order->user_id)
																				<div class="mb-3">
																								<label class="control-label">{{ __('Khách hàng') }}:</label>
																								<x-select name="order[user_id]" id="user_id" class="select2-bs5-ajax"
																												data-url="{{ route('admin.search.select.user') }}" :required="true">
																												<x-select-option :option="$order->user_id" :value="$order->user_id" :title="$order->user->fullname" />
																								</x-select>
																				</div>
																@endif
																<div class="mb-3">
																				<label for=""><i class="ti ti-note"></i> {{ __('Ghi chú') }}:</label>
																				<textarea name="order[note]" class="form-control">{{ $order->note }}</textarea>
																</div>
												</div>
												<div class="col-12 col-md-6">
																<h3>{{ __('Thông tin giao hàng') }}</h3>
																<div id="infoShipping">
																				@include('admin.orders.partials.info-shipping')
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
