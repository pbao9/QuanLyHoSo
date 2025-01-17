<?php

namespace App\Admin\Services\EvaluationCategory;

use App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface;
use App\Admin\Traits\AuthService;
use App\Traits\UseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationCategoryService implements EvaluationCategoryServiceInterface
{
    use UseLog;
    protected $repository;

    public function __construct(
        EvaluationCategoryRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $evaluationCategory = $this->repository->create($data);
            DB::commit();
            return $evaluationCategory;
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
            $evaluationCategory = $this->repository->update($data['id'], $data);
            DB::commit();
            return $evaluationCategory;
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
