<?php

namespace App\Admin\Http\Requests\Order;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Order\OrderStatus;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends BaseRequest
{
    public function methodPost()
    {
        return [
            'order.user_id' => ['required', 'exists:App\Models\User,id'],
            'order.note' => ['nullable'],
            'order.total' => ['nullable'],
            'order.payment_method' => ['nullable'],
            'order_detail.product_id' => ['required', 'array'],
            'order_detail.product_id.*' => ['required', 'exists:App\Models\Product,id'],
            'order_detail.product_variation_id' => ['required', 'array'],
            'order_detail.product_variation_id.*' => ['required'],
            'order_detail.product_qty' => ['required', 'array'],
            'order_detail.product_qty.*' => ['required', 'integer', 'min:1'],
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodPut()
    {
        return [
            'order.id' => ['required', 'exists:App\Models\Order,id'],
            'order.status' => ['required', new Enum(OrderStatus::class)],
            'order.user_id' => ['nullable', 'exists:App\Models\User,id'],
            'order.total' => ['nullable'],
            'order.note' => ['nullable'],
            'order.payment_method' => ['nullable'],
            'order_detail.id' => ['nullable', 'array'],
            'order_detail.product_id' => ['nullable', 'array'],
            'order_detail.product_id.*' => ['nullable', 'exists:App\Models\Product,id'],
            'order_detail.product_variation_id' => ['nullable', 'array'],
            'order_detail.product_variation_id.*' => ['nullable'],
            'order_detail.product_qty' => ['nullable', 'array'],
            'order_detail.product_qty.*' => ['nullable', 'integer', 'min:1'],
        ];
    }

    protected function methodGet()
    {
        if ($this->routeIs('admin.order.render_info_shipping')) {
            return [
                'user_id' => ['required', 'exists:App\Models\User,id']
            ];
        } elseif ($this->routeIs('admin.order.add_product')) {
            return [
                'product_id' => ['required', 'exists:App\Models\Product,id'],
                'product_variation_id' => ['nullable', 'exists:App\Models\ProductVariation,id'],
            ];
        } elseif ($this->routeIs('admin.order.calculate_total_before_save_order')) {
            return [
                'order.user_id' => ['nullable', 'exists:App\Models\User,id'],
                'order_detail.product_id.*' => ['required', 'exists:App\Models\Product,id'],
                'order_detail.product_variation_id.*' => ['required'],
                'order_detail.product_qty.*' => ['required', 'integer', 'min:1'],
            ];
        }
        return [];
    }
}
