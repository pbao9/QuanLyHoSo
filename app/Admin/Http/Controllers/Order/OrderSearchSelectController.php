<?php

namespace App\Admin\Http\Controllers\Order;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Http\Resources\Order\OrderSearchSelectResource;

class OrderSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        OrderRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    protected function selectResponse()
    {
        $this->instance = [
            'results' => OrderSearchSelectResource::collection($this->instance)
        ];
    }
}
