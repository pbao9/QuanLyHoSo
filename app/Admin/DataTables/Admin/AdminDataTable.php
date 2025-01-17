<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;

class AdminDataTable extends BaseDataTable
{

    protected $nameTable = 'adminTable';

    public function __construct(
        AdminRepositoryInterface $repository
    ) {
        $this->repository = $repository;

        parent::__construct();
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.admins.datatable.action',
            'roles' => 'admin.admins.datatable.roles',
            'edit-link' => 'admin.admins.datatable.editlink'

        ];
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [0, 1, 2, 3, 4, 5];

        $this->columnSearchDate = [5];
    }

    public function query()
    {
        return $this->repository->getByQueryBuilder([], ['roles', 'department']);
    }

    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatables_columns.admin', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'created_at' => '{{ format_date($created_at) }}',
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'roles' => function ($instance) {
                return $instance->roles->pluck('title')->join(', ');
            },
            'department' => function ($instance) {
                return $instance->department->name ?? '';
            },
            'fullname' => $this->view['edit-link']
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['action', 'roles', 'fullname', 'department'];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            'roles' => function ($query, $keyword) {
                $query->whereHas('roles', function ($subQuery) use ($keyword) {
                    $subQuery->where('title', 'like', '%' . $keyword . '%');
                });
            },
            'department' => function ($query, $keyword) {
                $query->whereHas('department', function ($subQuery) use ($keyword) {
                    $subQuery->where('name', 'like', '%' . $keyword . '%');
                });
            },
        ];
    }
}
