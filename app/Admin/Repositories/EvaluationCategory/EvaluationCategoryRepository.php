<?php

namespace App\Admin\Repositories\EvaluationCategory;

use App\Admin\Repositories\EloquentRepository;
use App\Models\EvaluationCategory;
use App\Models\EvaluationCriteria;

class EvaluationCategoryRepository extends EloquentRepository implements EvaluationCategoryRepositoryInterface
{

    public function getModel(): string
    {
        return EvaluationCategory::class;
    }
}
