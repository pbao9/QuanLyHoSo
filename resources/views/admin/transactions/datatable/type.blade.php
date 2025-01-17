<span @class(['badge', App\Enums\Payment\PaymentType::from($type)->badge()])>{{ \App\Enums\Payment\PaymentType::getDescription($type) }}</span>
