<?php

namespace App\Admin\Repositories\Evaluation;

use App\Admin\Repositories\EloquentRepository;
use App\Models\DepartmentShift;
use App\Models\Evaluations;

class EvaluationRepository extends EloquentRepository implements EvaluationRepositoryInterface
{

    public function getModel(): string
    {
        return Evaluations::class;
    }
    public function attachDetails(Evaluations $evaluation, array $criteriaData)
    {
        $formattedData = [];
        foreach ($criteriaData as $criteria) {
            if (isset($criteria['id']) && isset($criteria['status'])) {
                $formattedData[$criteria['id']] = ['status' => $criteria['status']];
            }
        }

        if (!empty($formattedData)) {
            return $evaluation->details()->attach($formattedData);
        } else {
            throw new \Exception('No valid criteria data to attach');
        }
    }

    public function syncDetails(Evaluations $evaluation, array $criteriaData)
    {
        $formattedData = [];
        foreach ($criteriaData as $criteria) {
            if (isset($criteria['id']) && isset($criteria['status'])) {
                $formattedData[$criteria['id']] = ['status' => $criteria['status']];
            }
        }

        if (!empty($formattedData)) {
            return $evaluation->details()->sync($formattedData);
        } else {
            throw new \Exception('No valid criteria data to sync');
        }
    }

    public function findOrFailWithRelations($id, array $relations = ['details'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }
}
