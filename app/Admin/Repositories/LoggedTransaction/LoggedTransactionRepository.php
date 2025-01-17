<?php

namespace App\Admin\Repositories\LoggedTransaction;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepositoryInterface;
use App\Models\LoggedTransaction;

class LoggedTransactionRepository extends EloquentRepository implements LoggedTransactionRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return LoggedTransaction::class;
    }
}
