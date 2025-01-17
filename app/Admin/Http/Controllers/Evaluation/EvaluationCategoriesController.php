<?php

namespace App\Admin\Http\Controllers\Evaluation;

use App\Admin\DataTables\EvaluationCategory\EvaluationCategoryDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Evaluation\EvaluationCategoriesRequest;
use App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface;
use App\Admin\Services\EvaluationCategory\EvaluationCategoryServiceInterface;
use App\Traits\ResponseController;

class EvaluationCategoriesController extends Controller
{
    use ResponseController;

    public function __construct(
        EvaluationCategoryRepositoryInterface $repository,
        EvaluationCategoryServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }


    public function getView()
    {
        return [
            'index' => 'admin.evaluation_category.index',
            'edit' => 'admin.evaluation_category.edit',
            'create' => 'admin.evaluation_category.create',

        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.evaluation.category.index',
            'create' => 'admin.evaluation.category.create',
            'edit' => 'admin.evaluation.category.edit',

        ];
    }

    public function index(EvaluationCategoryDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], [
            'breadcrumbs' => $this->crums->add(__('evaluationCategory'), route($this->route['index'])),
        ]);
    }


    public function create()
    {
        return view($this->view['create'], [
            'breadcrumbs' => $this->crums->add(__('evaluationCategory'),     route($this->route['index']))->add(__('addEvaluationCategory')),
        ]);
    }

    public function store(EvaluationCategoriesRequest $request)
    {
        $response = $this->service->store($request);
        return $this->handleResponse($response, $request, $this->route['index'], $this->route['edit']);
    }


    public function edit($id)
    {
        $response = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'evaluationCategory' => $response,
                'breadcrumbs' => $this->crums->add(__('evaluationCategory'), route($this->route['index']))->add(__('editEvaluationCategory')),
            ],
        );
    }

    public function update(EvaluationCategoriesRequest $request)
    {
        $response = $this->service->update($request);
        return $this->handleUpdateResponse($response, $this->route['edit']);
    }

    public function delete($id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
