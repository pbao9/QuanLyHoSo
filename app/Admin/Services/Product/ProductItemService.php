<?php

namespace App\Admin\Services\Product;

use App\Admin\Services\Product\ProductItemServiceInterface;
use App\Admin\Repositories\Product\ProductItemRepositoryInterface;
use App\Admin\Services\File\FileService;
use Illuminate\Http\Request;

class ProductItemService implements ProductItemServiceInterface
{
    protected $fileService;
    protected $data;

    protected $repository;

    public function __construct(ProductItemRepositoryInterface $repository, FileService $fileService)
    {
        $this->repository = $repository;
        $this->fileService = $fileService;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $this->data['file'] = 'uploads/' . $filename;
        }

        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();

        $instance = $this->repository->findOrFail($this->data['id']);

        if ($request->hasFile('file')) {
            if ($instance->file) {
                $oldFilePath = public_path($instance->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $this->data['file'] = 'uploads/' . $filename;
        }
        return $this->repository->update($this->data['id'], $this->data);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
