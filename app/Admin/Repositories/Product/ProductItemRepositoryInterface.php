<?php

namespace App\Admin\Repositories\Product;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface ProductItemRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithRelations($id, $relations = ['product']);
    public function getQueryBuilderByColumns($column, $value);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}
