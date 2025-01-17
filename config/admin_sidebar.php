<?php

return [
    [
        'title' => 'Trang chủ',
        'routeName' => 'admin.dashboard',
        'icon' => '<i class="ti ti-home"></i>',
        'roles' => [],
        'permissions' => ['mevivuDev'],
        'sub' => []
    ],
    [
        'title' => 'Quản lý Nhân viên',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-shield"></i>',
        'roles' => [],
        'permissions' => ['createAdmin', 'viewAdmin', 'updateAdmin', 'deleteAdmin'],
        'sub' => [
            [
                'title' => 'Thêm nhân viên',
                'routeName' => 'admin.admin.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
                'permissions' => ['createAdmin'],
            ],
            [
                'title' => 'DS nhân viên',
                'routeName' => 'admin.admin.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['viewAdmin'],
            ],
        ]
    ],
    [
        'title' => 'Quản lý Khoa',
        'routeName' => null,
        'icon' => '<i class="ti ti-circles"></i>',
        'roles' => [],
        'permissions' => ['createDepartment', 'viewDepartment', 'updateDepartment', 'deleteDepartment'],
        'sub' => [
            [
                'title' => 'Thêm Phòng Khoa',
                'routeName' => 'admin.department.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
                'permissions' => ['createDepartment'],
            ],
            [
                'title' => 'DS Phòng Khoa',
                'routeName' => 'admin.department.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['viewDepartment'],
            ],
        ]
    ],
    [
        'title' => 'Quản lý bảng Đánh giá',
        'routeName' => null,
        'icon' => '<i class="ti ti-file-spreadsheet"></i>',
        'roles' => [],
        'permissions' => ['createEvaluation', 'viewEvaluation', 'updateEvaluation', 'deleteEvaluation'],
        'sub' => [
            [
                'title' => 'Thêm Đánh giá',
                'routeName' => 'admin.evaluation.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
                'permissions' => ['createEvaluation'],
            ],
            [
                'title' => 'DS Đánh giá',
                'routeName' => 'admin.evaluation.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['viewEvaluation'],
            ],
            [
                'title' => 'DS Chuyên mục',
                'routeName' => 'admin.evaluation.category.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['mevivuDev'],
            ],
        ]
    ],
    [
        'title' => 'QL Thông báo',
        'routeName' => null,
        'icon' => '<i class="ti ti-bell-ringing"></i>',
        'roles' => [],
        'permissions' => [
            'createNotification',
            'viewNotification',
            'updateNotification',
            'deleteNotification',
        ],
        'sub' => [
            [
                'title' => 'Thêm thông báo',
                'routeName' => 'admin.notification.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
                'permissions' => ['createNotification'],
            ],
            [
                'title' => 'DS thông báo',
                'routeName' => 'admin.notification.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['viewNotification'],
            ],
        ]
    ],
    [
        'title' => 'Vai trò',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-check"></i>',
        'roles' => [],
        'permissions' => ['createRole', 'viewRole', 'updateRole', 'deleteRole'],
        'sub' => [
            [
                'title' => 'Thêm Vai trò',
                'routeName' => 'admin.role.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
                'permissions' => ['createRole'],
            ],
            [
                'title' => 'DS Vai trò',
                'routeName' => 'admin.role.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
                'permissions' => ['viewRole'],
            ]
        ]
    ],

    [
        'title' => 'Cài đặt',
        'routeName' => null,
        'icon' => '<i class="ti ti-settings"></i>',
        'roles' => [],
        'permissions' => ['settingGeneral'],
        'sub' => [
            [
                'title' => 'Chung',
                'routeName' => 'admin.setting.general',
                'icon' => '<i class="ti ti-tool"></i>',
                'roles' => [],
                'permissions' => ['settingGeneral'],
            ],
        ]
    ],
];
