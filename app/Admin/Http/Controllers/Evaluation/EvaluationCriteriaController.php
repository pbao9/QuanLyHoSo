<?php

namespace App\Admin\Http\Controllers\Evaluation;

use App\Admin\DataTables\EvaluationCriteria\EvaluationCriteriaDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Evaluation\EvaluationCriteriaRequest;
use App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface;
use App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface;
use App\Admin\Services\EvaluationCriteria\EvaluationCriteriaServiceInterface;
use Illuminate\Http\Request;

class EvaluationCriteriaController extends Controller
{
    protected $categoryRepository;

    public function __construct(
        EvaluationCriteriaRepositoryInterface $repository,
        EvaluationCategoryRepositoryInterface $categoryRepository,
        EvaluationCriteriaServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->service = $service;
    }


    public function getView()
    {
        return [
            'index' => 'admin.evaluation_criteria.index',
            'edit' => 'admin.evaluation_criteria.edit',
            'create' => 'admin.evaluation_criteria.create',

        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.evaluation.category.criteria.index',
            'create' => 'admin.evaluation.category.criteria.index',
            'edit' => 'admin.evaluation.category.criteria.index',
            'editCategory' => 'admin.evaluation.category.edit',

        ];
    }

    public function index($categoryId, EvaluationCriteriaDataTable $dataTable)
    {
        $category = $this->categoryRepository->findOrFail($categoryId);
        return $dataTable->with('category', $category)
            ->render($this->view['index'], [
                'category' => $category,
                'breadcrumbs' => $this->crums
                    ->add(__('evaluationCategory'), route(
                        $this->route['editCategory'],
                        $category->id
                    ))
                    ->add(
                        __('evaluationCriteria'),
                        route(
                            $this->route['index'],
                            ['category_id' => $category]
                        )
                    ),
            ]);
    }


    public function create($categoryId)
    {
        $category = $this->categoryRepository->findOrFail($categoryId);
        return view($this->view['create'], [
            'category' => $category,
            'breadcrumbs' => $this->crums->add(
                __('evaluationCriteria'),
                route(
                    $this->route['index'],
                    ['category_id' => $category]
                )
            )->add(__('addEvaluationCriteria')),
        ]);
    }

    public function store(EvaluationCriteriaRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return redirect()->route($this->route['index'], $response->category_id)->with('success', __('notifySuccess'));
        }
        return redirect()->route($this->route['create'])->with('error', __('notifyFail'));
    }


    public function edit($categoryId, $id)
    {

        $category = $this->categoryRepository->findOrFail($categoryId);
        $response = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'criteria' => $response,
                'category' => $category,
                'breadcrumbs' => $this->crums
                    ->add(__('evaluationCategory'), route(
                        $this->route['editCategory'],
                        $category->id
                    ))
                    ->add(__('evaluationCriteria'), route(
                        $this->route['index'],
                        ['category_id' => $category]
                    ))->add(__('editEvaluationCriteria')),
            ],
        );
    }

    public function update(EvaluationCriteriaRequest $request)
    {
        $response = $this->service->update($request);
        if ($response) {
            return back()->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'));
    }


    public function delete($categoryId, $id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'],  $categoryId)->with('success', __('notifySuccess'));
    }
}
