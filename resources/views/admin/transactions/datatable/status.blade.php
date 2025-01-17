<span @class([
				'badge',
				App\Enums\Order\PaymentStatus::from($status)->badge(),
])>{{ \App\Enums\Order\PaymentStatus::getDescription($status) }}</span>
