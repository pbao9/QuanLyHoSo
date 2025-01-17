<?php

namespace App\Admin\Repositories\Admin;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Traits\BaseAuthCMS;
use App\Models\Admin;

class AdminRepository extends EloquentRepository implements AdminRepositoryInterface
{
    use BaseAuthCMS;

    protected $select = [];

    public function getModel(): string
    {
        return Admin::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'fullname', 'phone'])
    {
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);

        foreach ($meta as $key => $value) {
            $this->instance = $this->instance->where($key, $value);
        }

        return $this->instance->get();
    }

    protected function getQueryBuilderFindByKey($key): void
    {
        $this->instance = $this->instance->where(function ($query) use ($key) {
            return $query->where('username', 'LIKE', '%' . $key . '%')
                ->orWhere('phone', 'LIKE', '%' . $key . '%')
                ->orWhere('email', 'LIKE', '%' . $key . '%')
                ->orWhere('fullname', 'LIKE', '%' . $key . '%');
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->with('roles')->orderBy($column, $sort);
        return $this->instance;
    }

    public function updateObject($admin, $data)
    {
        $admin->update($data);
        return $admin;
    }
}
