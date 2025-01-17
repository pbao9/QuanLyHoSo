<?php

namespace App\Admin\Http\Controllers\Dashboard;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Notification\NotificationRepositoryInterface;
use App\Admin\Traits\AuthService;

class DashboardController extends Controller
{
    use AuthService;
    protected $notificationRepository;

    public function __construct(NotificationRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'index' => 'admin.dashboard.index'
        ];
    }
    public function index()
    {
        $notifications = $this->repository->getBy(['admin_id' => $this->getCurrentAdminId()]);
        return view($this->view['index'], [
            'notifications' => $notifications
        ]);
    }
}
