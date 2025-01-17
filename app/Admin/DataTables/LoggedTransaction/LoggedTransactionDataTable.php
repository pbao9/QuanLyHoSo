<?php

namespace App\Admin\DataTables\LoggedTransaction;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepositoryInterface;
use App\Enums\Order\PaymentStatus;
use App\Enums\Payment\PaymentType;
use Illuminate\Database\Eloquent\Builder;

class LoggedTransactionDataTable extends BaseDataTable
{

    protected $nameTable = 'loggedTransactionTable';

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        LoggedTransactionRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }
    protected function setColumnSearch()
    {
        $this->columnAllSearch = [1, 2, 3, 4, 5, 6, 7, 8];

        $this->columnSearchDate = [6, 7, 8];

        $this->columnSearchSelect = [
            [
                'column' => 5,
                'data' => PaymentStatus::asSelectArray()
            ],
            [
                'column' => 4,
                'data' => PaymentType::asSelectArray()
            ],
        ];
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.transactions.datatable.action',
            'status' => 'admin.transactions.datatable.status',
            'type' => 'admin.transactions.datatable.type',
            'user' => 'admin.transactions.datatable.user',
            'editlink' => 'admin.transactions.datatable.editlink',
            'checkbox' => 'admin.transactions.datatable.checkbox',
        ];
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'status' => $this->view['status'],
            'type' => $this->view['type'],
            'user' => $this->view['user'],
            'created_at' => '{{ format_date($created_at, "d-m-Y") }}',
            'due_date' => '{{ format_date($due_date, "d-m-Y") }}',
            'paid_at' => '{{ $paid_at ? format_date($paid_at, "d-m-Y") : "Chưa thanh toán" }}',
            'amount' => '{{ format_price($amount) }}',
            'code' => $this->view['editlink'],
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->repository->getByQueryBuilder([], ['user']);
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
        $this->customColumns = config('datatables_columns.transaction', []);
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'checkbox' => $this->view['checkbox'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = ['id', 'status', 'user', 'action', 'type', 'code', 'checkbox'];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            'user' => function ($query, $keyword) {
                $query->whereHas('user', function ($subQuery) use ($keyword) {
                    $subQuery->where('fullname', 'like', '%' . $keyword . '%');
                });
            },
        ];
    }
}
