<?php

namespace App\Admin\Repositories\InstallmentType;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\InstallmentType\InstallmentTypeRepositoryInterface;
use App\Models\InstallmentType;

class InstallmentTypeRepository extends EloquentRepository implements InstallmentTypeRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return InstallmentType::class;
    }
}
