<?php

namespace App\Admin\DataTables\ShiftDepartment;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Department\DepartmentRepositoryInterface;
use App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class ShiftDepartmentDataTable extends BaseDataTable
{

    protected $nameTable = 'shiftDepartmentTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        ShiftDepartmentRepositoryInterface $repository
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
            'action' => 'admin.shift.datatable.action',
            'id' => 'admin.shift.datatable.id',
            'count' => 'admin.shift.datatable.count'
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
        $this->customColumns = config('datatables_columns.shift', default: ['']);
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
