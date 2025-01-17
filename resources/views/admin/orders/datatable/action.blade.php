<div class="d-flex">
				@if ($status == App\Enums\Order\OrderStatus::Pending->value)
								<a id="confirm-order" href="{{ route('admin.order.confirm', $id) }}" class="ml-2">
												<i class="btn btn-info btn-icon ti ti-alert-circle"></i>
								</a>
								<a id="cancel-order" style="margin-left: 0.3rem" href="{{ route('admin.order.cancel', $id) }}" class="ml-2">
												<i class="btn btn-warning btn-icon ti ti-circle-x"></i>
								</a>
				@endif
				<x-button.modal-delete style="margin-left: 0.3rem" class="btn-icon"
								data-route="{{ route('admin.order.delete', $id) }}">

				</x-button.modal-delete>
</div>
