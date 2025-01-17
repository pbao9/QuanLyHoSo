<?php

namespace App\Admin\Repositories\Product;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Product\ProductItemRepositoryInterface;
use App\Models\ProductItem;

class ProductItemRepository extends EloquentRepository implements ProductItemRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return ProductItem::class;
    }
    public function findOrFailWithRelations($id, $relations = ['product'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }
    public function getQueryBuilderByColumns($column, $value)
    {
        $this->getQueryBuilderOrderBy('id', 'desc');
        $this->instance = $this->instance->where($column, $value);
        return $this->instance;
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
