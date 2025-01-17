<?php

namespace App\Admin\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderSearchSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => 'Hóa đơn #' . $this->id .  ' | Trị giá: ' . $this->total . ' | Ngày đặt: ' . format_date($this->created_at, 'd-m-Y')
        ];
    }
}
