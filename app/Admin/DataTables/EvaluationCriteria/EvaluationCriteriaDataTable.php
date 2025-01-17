<?php

namespace App\Admin\DataTables\EvaluationCriteria;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Evaluation\EvaluationRepositoryInterface;
use App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EvaluationCriteriaDataTable extends BaseDataTable
{

    protected $nameTable = 'evaluationCriteriaTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        EvaluationCriteriaRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }
    protected function setColumnSearch()
    {
        $this->columnAllSearch = [0, 1];
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.evaluation_criteria.datatable.action',
            'status' => 'admin.evaluation_criteria.datatable.status',
            'id' => 'admin.evaluation_criteria.datatable.id',
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'id' => $this->view['id'],
            'created_at' => '{{ format_date($created_at) }}',
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderByColumns('category_id', $this->category->id);
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
        $this->customColumns = config('datatables_columns.evaluation_criteria', []);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['id', 'action'];
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
