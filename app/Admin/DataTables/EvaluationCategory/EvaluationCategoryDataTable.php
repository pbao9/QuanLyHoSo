<?php

namespace App\Admin\DataTables\EvaluationCategory;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface;
use App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EvaluationCategoryDataTable extends BaseDataTable
{

    protected $nameTable = 'evaluationCategoryTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        EvaluationCategoryRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }
    protected function setColumnSearch()
    {
        $this->columnAllSearch = [0, 1, 2];
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.evaluation_category.datatable.action',
            'status' => 'admin.evaluation_category.datatable.status',
            'criteria' => 'admin.evaluation_category.datatable.criteria',
            'id' => 'admin.evaluation_category.datatable.id',
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'id' => $this->view['id'],
            'criteria' => $this->view['criteria'],
            'created_at' => '{{ format_date($created_at) }}',
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->repository->getByQueryBuilder([], []);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    /**
     * Get columns.
     *
     * @return void
     */
    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatables_columns.evaluation_category', []);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'criteria' => $this->view['criteria']
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['id', 'action', 'criteria'];
    }

    public function setCustomFilterColumns(): void
    {
        // $this->customFilterColumns = [
        //     'admin' => function ($query, $keyword) {
        //         $query->whereHas('admin', function ($subQuery) use ($keyword) {
        //             $subQuery->where('fullname', 'like', '%' . $keyword . '%');
        //         });
        //     },
        // ];
    }
}
