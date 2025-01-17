<?php

namespace App\Admin\DataTables\InstallmentType;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\InstallmentType\InstallmentTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class InstallmentTypeDataTable extends BaseDataTable
{

    protected $nameTable = 'installmentTypeTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        InstallmentTypeRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }
    protected function setColumnSearch()
    {
        $this->columnAllSearch = [0, 1, 2, 3];
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.installment_types.datatable.action',
            'editlink' => 'admin.installment_types.datatable.editlink',
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'name' => $this->view['editlink'],
            'duration_months' => '{{ $duration_months . " Tháng"}}',
            'monthly_percentage' => '{{ $monthly_percentage . "%"}}',
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->repository->getByQueryBuilder([]);
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
        $this->customColumns = config('datatables_columns.installment_types', []);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['name', 'action'];
    }

    public function setCustomFilterColumns(): void {}
}
