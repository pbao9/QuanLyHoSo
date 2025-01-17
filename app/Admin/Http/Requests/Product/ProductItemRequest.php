<?php

namespace App\Admin\Http\Requests\Product;

use App\Admin\Http\Requests\BaseRequest;
use App\Models\ProductItem;
use Illuminate\Contracts\Validation\Validator;

class ProductItemRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'chapter' => ['required', 'string'],
            'product_id' => ['required', 'exists:App\Models\Product,id'],
            'file' => ['required', 'mimes:pdf', 'max:10000'],
            'price' => ['required'],
            'promotion_price' => ['required'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\ProductItem,id'],
            'chapter' => ['required', 'string'],
            'file' => ['nullable', 'mimes:pdf', 'max:10000'],
            'price' => ['required'],
            'promotion_price' => ['required'],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     */
    protected function withValidator(Validator $validator)
    {
        // Thêm logic kiểm tra unique chapter - product_id
        $validator->after(function ($validator) {
            $method = $this->getMethod();
            $productId = $this->input('product_id');
            $chapter = $this->input('chapter');
            $id = $this->input('id');

            if ($method === 'POST') {
                $exists = ProductItem::where('product_id', $productId)
                    ->where('chapter', $chapter)
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('chapter', 'Chương này đã tồn tại trong sản phẩm này rồi.');
                }
            }

            if ($method === 'PUT') {
                $exists = ProductItem::where('product_id', $productId)
                    ->where('chapter', $chapter)
                    ->where('id', '!=', $id) // Bỏ qua id hiện tại
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('chapter', 'Chương này đã tồn tại trong sản phẩm này rồi.');
                }
            }
        });
    }
}
