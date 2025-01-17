<?php

namespace App\Admin\Services\EvaluationCriteria;

use App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface;
use App\Traits\UseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationCriteriaService implements EvaluationCriteriaServiceInterface
{
    use UseLog;
    protected $repository;

    public function __construct(
        EvaluationCriteriaRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $evaluationCriteria = $this->repository->create($data);
            DB::commit();
            return $evaluationCriteria;
        } catch (Exception $e) {
            DB::rollBack();
            $this->logError('Thất bại khi tạo dữ liệu', $e);
            return false;
        }
    }

    public function update(Request $request)
    {


        DB::beginTransaction();
        try {
            $data = $request->validated();
            $evaluationCriteria = $this->repository->update($data['id'], $data);
            DB::commit();
            return $evaluationCriteria;
        } catch (Exception $e) {
            DB::rollBack();
            $this->logError('Thất bại khi sửa dữ liệu', $e);
            return false;
        }
    }

    public function delete($id): object|bool
    {
        return $this->repository->delete($id);
    }
}
