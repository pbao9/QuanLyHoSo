<?php

namespace App\Admin\Http\Controllers\Evaluation;

use App\Admin\DataTables\Evaluation\EvaluationDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Evaluation\EvaluationRequest;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\Evaluation\EvaluationRepositoryInterface;
use App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface;
use App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use App\Admin\Services\Evaluation\EvaluationServiceInterface;
use App\Enums\Evaluation\EvaluationShift;
use App\Models\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{

    protected $departmentRepository;
    protected $shiftDepartmentRepository;
    protected $evaluationCriteriaRepository;
    protected $evaluationCategoryRepository;
    public function __construct(
        EvaluationRepositoryInterface $repository,
        DepartmentRepositoryInterface $departmentRepository,
        ShiftDepartmentRepositoryInterface $shiftDepartmentRepository,
        EvaluationCriteriaRepositoryInterface $evaluationCriteriaRepository,
        EvaluationCategoryRepositoryInterface $evaluationCategoryRepository,
        EvaluationServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
        $this->shiftDepartmentRepository = $shiftDepartmentRepository;
        $this->evaluationCriteriaRepository = $evaluationCriteriaRepository;
        $this->evaluationCategoryRepository = $evaluationCategoryRepository;
        $this->service = $service;
    }


    public function getView()
    {
        return [
            'index' => 'admin.evaluation.index',
            'edit' => 'admin.evaluation.edit',
            'create' => 'admin.evaluation.create',

        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.evaluation.index',
            'create' => 'admin.evaluation.index',
            'edit' => 'admin.evaluation.index',

        ];
    }

    public function index(EvaluationDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], []);
    }


    public function create()
    {
        $category = $this->evaluationCategoryRepository->getAll();
        $categoryIds = $category->pluck('id')->toArray();

        $criteria = $this->evaluationCriteriaRepository->getByCategory($categoryIds);
        $type = $this->departmentRepository->getAll();
        return view($this->view['create'], [
            'shifts' => EvaluationShift::asSelectArray(),
            'types' => $type,
            'criteria' => $criteria,
            'category' => $category,
        ]);
    }

    public function getShiftsByDepartment(Request $request)
    {
        $departmentId = $request->input('department_id');
        $shifts = $this->shiftDepartmentRepository->getShiftsByDepartment($departmentId);

        return response()->json($shifts);
    }

    public function store(EvaluationRequest $request)
    {
        $response = $this->service->store($request);

        if ($response) {
            return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));
        }
        return redirect()->route($this->route['create'])->with('error', __('notifyFail'));
    }


    public function edit($id)
    {
        $response = $this->repository->findOrFailWithRelations($id);

        $statusArray = [];
        foreach ($response->details as $detail) {
            $statusArray[$detail->id] = $detail->pivot->status;
        }

        $category = $this->evaluationCategoryRepository->getAll();
        $categoryIds = $category->pluck('id')->toArray();

        $criteria = $this->evaluationCriteriaRepository->getByCategory($categoryIds);
        $type = $this->departmentRepository->getAll();
        return view(
            $this->view['edit'],
            [
                'evaluation' => $response,
                'types' => $type,
                'statusArray' => $statusArray,
                'criteria' => $criteria,
                'category' => $category,
            ],
        );
    }

    public function update(EvaluationRequest $request)
    {
        $response = $this->service->update($request);
        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }


    public function delete($id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
