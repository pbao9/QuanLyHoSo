<table id="tableTotalOrder" class="table-transparent table-responsive table">
				<thead class="d-none">
								<tr>
												<th class="text-center" style="width: 1%"></th>
												<th>{{ __('Sản phẩm') }}</th>
												<th class="text-center" style="width: 15%">{{ __('Số lượng') }}</th>
												<th class="text-end" style="width: 1%">{{ __('Đơn giá') }}</th>
												<th class="text-end" style="width: 1%">{{ __('Tổng tiền') }}</th>
								</tr>
				</thead>
				<tbody>
								<tr>
												<td colspan="4" class="strong text-end">{{ __('Tạm tính') }}</td>
												<td class="text-end">{{ format_price($total ?? 0) }}</td>
								</tr>
								<tr>
												<td colspan="4" class="font-weight-bold text-uppercase text-end">{{ __('Tổng cộng') }}</td>
												<td class="text-end">
																@if (isset($order))
																				{{ format_price($order->total) }}
																@else
																				{{ format_price($total) }}
																@endif
												</td>
								</tr>
				</tbody>
				<x-input type="hidden" name="order[total]" :value="$total ?? 0" />
</table>
