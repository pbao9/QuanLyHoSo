<?php

namespace App\Admin\Services\Evaluation;

use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Evaluation\EvaluationRepositoryInterface;
use App\Admin\Traits\AuthService;
use App\Traits\UseLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EvaluationService implements EvaluationServiceInterface
{
    use UseLog;
    use AuthService;

    protected $data;

    protected $repository;
    private AdminRepositoryInterface $adminRepository;
    public function __construct(
        EvaluationRepositoryInterface $repository,
        AdminRepositoryInterface        $adminRepository,
    ) {
        $this->repository = $repository;
        $this->adminRepository = $adminRepository;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $evaluationCriteria = $data['evaluation_criteria'] ?? [];
            unset($data['evaluation_criteria']);
            $evaluationData = $data['evaluation'] ?? [];
    
            $evaluation = $this->repository->create($evaluationData);
    
            if (!empty($evaluationCriteria)) {
                $this->repository->attachDetails($evaluation, $evaluationCriteria);
            }

            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Failed to store evaluation', ['error' => $e->getMessage()]);
            return false;
        }
    }
    

    public function update(Request $request): object|bool
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $evaluationCriteria = $data['evaluation_criteria'] ?? [];
            unset($data['evaluation_criteria']);
            $evaluationData = $data['evaluation'] ?? [];
    
            $evaluation = $this->repository->update($evaluationData['id'], $evaluationData);
    
            if (!empty($evaluationCriteria)) {
                $this->repository->syncDetails($evaluation, $evaluationCriteria);
            }

            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Failed to update evaluation', ['error' => $e->getMessage()]);
            return false;
        }
    }

    public function delete($id): object|bool
    {
        return $this->repository->delete($id);
    }
}
