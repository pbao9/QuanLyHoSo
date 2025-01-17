<?php

namespace App\Admin\Repositories\Evaluation;

use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Evaluations;

interface EvaluationRepositoryInterface extends EloquentRepositoryInterface {
    public function syncDetails(Evaluations $evaluation, array $criteriaData);
    public function attachDetails(Evaluations $evaluation, array $criteriaData);
    public function findOrFailWithRelations($id, array $relations = ['details']);
}
