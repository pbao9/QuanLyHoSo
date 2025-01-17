<?php

namespace App\Admin\DataTables\Evaluation;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Evaluation\EvaluationRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class EvaluationDataTable extends BaseDataTable
{

    protected $nameTable = 'evaluationTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        EvaluationRepositoryInterface $repository
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
            'action' => 'admin.evaluation.datatable.action',
            'status' => 'admin.evaluation.datatable.status',
            'admin' => 'admin.evaluation.datatable.admin',
            'id' => 'admin.evaluation.datatable.id',
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'admin_id' => $this->view['admin'],
            'id' => $this->view['id'],
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
        return $this->repository->getByQueryBuilder([], ['admin']);
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
        $this->customColumns = config('datatables_columns.evaluation', []);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['id', 'admin_id', 'action'];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            'admin' => function ($query, $keyword) {
                $query->whereHas('admin', function ($subQuery) use ($keyword) {
                    $subQuery->where('fullname', 'like', '%' . $keyword . '%');
                });
            },
        ];
    }
}
