<?php

namespace App\Admin\DataTables\Product;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Product\ProductItemRepositoryInterface;
use App\Admin\Traits\GetConfig;

class ProductItemDataTable extends BaseDataTable
{

    use GetConfig;
    protected $nameTable = 'productItemTable';
    protected array $actions = ['reset', 'reload'];

    public function __construct(
        ProductItemRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->repository = $repository;
    }

    public function setView()
    {
        $this->view = [
            'action' => 'admin.products.items.datatable.action',
            'editlink' => 'admin.products.items.datatable.editlink',
            'price' => 'admin.products.items.datatable.price',
        ];
    }

    protected function setColumnSearch()
    {
        $this->columnAllSearch = [0, 1, 2];

        $this->columnSearchDate = [2];
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderByColumns('product_id', $this->product->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'chapter' => $this->view['editlink'],
            'price' => $this->view['price'],
            'created_at' => '{{ format_date($created_at) }}',
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function setCustomColumns()
    {
        $this->customColumns = $this->traitGetConfigDatatableColumns('product_item');
    }

    protected function filename(): string
    {
        return 'productItem_' . date('YmdHis');
    }
    protected function setCustomRawColumns()
    {
        $this->customRawColumns = ['chapter', 'file', 'action', 'price'];
    }
}
