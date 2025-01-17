<?php

namespace App\Admin\DataTables\Department;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class DepartmentDataTable extends BaseDataTable
{

    protected $nameTable = 'departmentTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        DepartmentRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }
    protected function setColumnSearch()
    {
        $this->columnAllSearch = [0];

        // $this->columnSearchDate = [5];
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.department.datatable.action',
            'id' => 'admin.department.datatable.id',
            'count' => 'admin.department.datatable.count'
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'id' => $this->view['id'],
            'count' => $this->view['count'],
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
        $this->customColumns = config('datatables_columns.department', ['']);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'count' => function ($department) {
                return $department->admin->count();
            },
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['id', 'action', 'count'];
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
