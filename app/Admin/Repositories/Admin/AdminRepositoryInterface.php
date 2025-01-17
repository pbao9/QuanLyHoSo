<?php

namespace App\Admin\Repositories\Admin;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface AdminRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'fullname', 'phone']);
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
    public function getAllRoles();
    public function updateObject($admin, $data);
}
