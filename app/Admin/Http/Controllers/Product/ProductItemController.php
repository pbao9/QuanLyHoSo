<?php

namespace App\Admin\Http\Controllers\Product;

use App\Admin\Http\Controllers\Controller;
use App\Admin\DataTables\Product\ProductItemDataTable;
use App\Admin\Repositories\Product\{ProductRepositoryInterface, ProductItemRepositoryInterface};
use App\Admin\Services\Product\ProductItemServiceInterface;
use App\Admin\Http\Requests\Product\ProductItemRequest;

class ProductItemController extends Controller
{
    protected $productRepository;
    public function __construct(
        ProductItemRepositoryInterface $repository,
        ProductRepositoryInterface $productRepository,
        ProductItemServiceInterface $service
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }
    public function getView()
    {
        return [
            'index' => 'admin.products.items.index',
            'create' => 'admin.products.items.create',
            'edit' => 'admin.products.items.edit'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.product.item.index',
            'create' => 'admin.product.item.create',
            'edit' => 'admin.product.item.edit',
            'delete' => 'admin.product.item.delete'
        ];
    }
    public function index($product_id, ProductItemDataTable $dataTable)
    {
        $product = $this->productRepository->findOrFail($product_id);
        return $dataTable->with('product', $product)->render($this->view['index'], [
            'product' => $product
        ]);
    }

    public function create($product_id)
    {
        $product = $this->productRepository->findOrFail($product_id);
        return view($this->view['create'], compact('product'));
    }

    public function store(ProductItemRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return to_route($this->route['index'], $response->product_id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id)
    {
        $productItem = $this->repository->findOrFailWithRelations($id);
        return view($this->view['edit'], compact('productItem'));
    }

    public function update(ProductItemRequest $request)
    {
        $response = $this->service->update($request);
        if ($response) {
            return to_route($this->route['index'], $response->product_id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function delete($product_id, $id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'], $product_id)->with('success', __('notifySuccess'));
    }
}
