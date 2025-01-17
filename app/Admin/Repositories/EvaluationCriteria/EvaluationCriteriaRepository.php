<?php

namespace App\Admin\Repositories\EvaluationCriteria;

use App\Admin\Repositories\EloquentRepository;
use App\Models\EvaluationCriteria;

class EvaluationCriteriaRepository extends EloquentRepository implements EvaluationCriteriaRepositoryInterface
{

    public function getModel()
    {
        return EvaluationCriteria::class;
    }
    public function findOrFailWithRelations($id, $relations = ['details'])
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


    public function getByCategory($categoryId)
    {
        return $this->model->where('category_id', $categoryId)->get();
    }
}
