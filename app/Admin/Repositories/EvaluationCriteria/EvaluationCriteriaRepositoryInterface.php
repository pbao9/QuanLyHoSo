<?php

namespace App\Admin\Repositories\EvaluationCriteria;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface EvaluationCriteriaRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderByColumns($column, $value);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function getByCategory($categoryId);
}
