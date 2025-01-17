<?php

return [
    'installment_types' => [
        'name' => [
            'title' => 'Tên loại trả góp',
            'icon' => 'ti-tag',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
            
        ],
        'duration_months' => [
            'title' => 'Tổng số tháng trả góp',
            'icon' => 'ti-clock',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'monthly_percentage' => [
            'title' => 'Phần trăm đơn hàng phải trả mỗi tháng',
            'icon' => 'ti-percentage',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'description' => [
            'title' => 'Mô tả',
            'icon' => 'ti-message',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'notification' => [
        'id' => [
            'title' => 'Mã',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'title' => [
            'title' => 'Tiêu đề',
            'icon' => 'ti-bell',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'admin_id' => [
            'title' => 'Người nhận',
            'icon' => 'ti-user',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'message' => [
            'title' => 'Nội dung',
            'icon' => 'ti-message',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-flag',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'created_at' => [
            'title' => 'Ngày thông báo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],

    'evaluation' => [
        'id' => [
            'title' => 'Mã',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'admin_id' => [
            'title' => 'Nhân viên tạo',
            'icon' => 'ti-shield',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],

    'evaluation_criteria' => [
        'name' => [
            'title' => 'Tiêu chí',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'description' => [
            'title' => 'Mô tả cụ thể',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'evaluation_category' => [
        'name' => [
            'title' => 'Tiêu đề',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'description' => [
            'title' => 'Mô tả',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'criteria' => [
            'title' => 'Tiêu chí',
            'icon' => 'ti-discout-2',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'department' => [
        'name' => [
            'title' => 'Tên phòng khoa',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-left align-middle',
            'orderable' => false,
        ],
        'count' => [
            'title' => 'Tổng số nhân viên',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'shift' => [
        'name' => [
            'title' => 'Ca làm việc',
            'icon' => 'ti-discount-2',
            'addClass' => 'text-left align-middle',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],

    'module' => [
        'id' => [
            'title' => 'ID',
            'icon' => 'ti-hash',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'name' => [
            'title' => 'Tên Module',
            'icon' => 'ti-box',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-check',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-tools',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'permission' => [
        'id' => [
            'title' => 'ID',
            'icon' => 'ti-hash',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'title' => [
            'title' => 'Tên quyền',
            'icon' => 'ti-lock',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'name' => [
            'title' => 'Slug ( Permission_name )',
            'icon' => 'ti-tag',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'module_id' => [
            'title' => 'Thuộc Module',
            'icon' => 'ti-folder',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'guard_name' => [
            'title' => 'Nhóm quyền ( Guard Name )',
            'icon' => 'ti-shield',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle',
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'admin' => [
        'fullname' => [
            'title' => 'Họ tên',
            'icon' => 'ti-user',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'icon' => 'ti-phone',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'email' => [
            'title' => 'Email',
            'icon' => 'ti-mail',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'Chức vụ',
            'icon' => 'ti-users',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'department' => [
            'title' => 'Phòng Khoa',
            'icon' => 'ti-users',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'visible' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle',
        ],
    ],
    'user' => [
        'fullname' => [
            'title' => 'Họ tên',
            'icon' => 'ti-user',
            'addClass' => 'text-center align-middle',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'icon' => 'ti-mail',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'icon' => 'ti-phone',
            'addClass' => 'text-center align-middle',
            'orderable' => false
        ],
        'gender' => [
            'title' => 'Giới tính',
            'icon' => 'ti-gender',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
            'visible' => false
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'category' => [
        'name' => [
            'title' => 'Tên danh mục',
            'icon' => 'ti-folder',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'avatar' => [
            'title' => 'Hình ảnh',
            'icon' => 'ti-photo',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'is_active' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'align-middle text-center',
            'visible' => false
        ],
        'icon' => [
            'title' => 'Icon',
            'icon' => 'ti-star',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'products' => [
            'title' => 'Danh sách sản phẩm',
            'icon' => 'ti-package',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'attribute' => [
        'position' => [
            'title' => 'Vị trí',
            'icon' => 'ti-layers-intersect',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'name' => [
            'title' => 'Tên thuộc tính',
            'icon' => 'ti-tag',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'type' => [
            'title' => 'Loại',
            'icon' => 'ti-clipboard-list',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'variations' => [
            'title' => 'Các biến thể',
            'icon' => 'ti-list-check',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'attributes_variations' => [
        'position' => [
            'title' => 'Vị trí',
            'icon' => 'ti-layers-intersect',
            'orderable' => false,
        ],
        'name' => [
            'title' => 'Tên biến thể',
            'icon' => 'ti-tag',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'desc' => [
            'title' => 'Mô tả',
            'icon' => 'ti-description',
            'addClass' => 'text-center align-middle',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'product' => [
        'avatar' => [
            'title' => 'Ảnh',
            'icon' => 'ti-photo',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'name' => [
            'title' => 'Tên',
            'icon' => 'ti-tag',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'in_stock' => [
            'title' => 'Kho',
            'icon' => 'ti-box',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'price' => [
            'title' => 'Giá',
            'width' => '150px',
            'icon' => 'ti-currency-dollar',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'categories' => [
            'title' => 'Danh mục',
            'icon' => 'ti-folder',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'product_item' => [
        'chapter' => [
            'title' => 'Chương',
            'icon' => 'ti-tag',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'price' => [
            'title' => 'Giá',
            'icon' => 'ti-currency-dollar',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'order' => [
        'id' => [
            'title' => 'Mã đơn hàng',
            'icon' => 'ti-receipt',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'user' => [
            'title' => 'Khách hàng',
            'icon' => 'ti-user',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'payment_method' => [
            'title' => 'PT Thanh toán',
            'icon' => 'ti-credit-card',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'total' => [
            'title' => 'Tổng tiền',
            'icon' => 'ti-currency-dollar',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Thời gian đặt',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'slider' => [
        'name' => [
            'title' => 'Tên',
            'icon' => 'ti-photo',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'plain_key' => [
            'title' => 'Key',
            'icon' => 'ti-key',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'items' => [
            'title' => 'Slider Item',
            'icon' => 'ti-slideshow',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'slider_item' => [
        'title' => [
            'title' => 'Tên',
            'icon' => 'ti-tag',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'image' => [
            'title' => 'Hình ảnh',
            'icon' => 'ti-photo',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'position' => [
            'title' => 'Vị trí',
            'icon' => 'ti-layers-intersect',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'post_category' => [
        'avatar' => [
            'title' => 'Ảnh đại diện',
            'icon' => 'ti-photo',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'name' => [
            'title' => 'Tên danh mục',
            'icon' => 'ti-folder',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'post' => [
        'image' => [
            'title' => 'Ảnh',
            'icon' => 'ti-photo',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'title' => [
            'title' => 'Tiêu đề',
            'icon' => 'ti-file',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'is_featured' => [
            'title' => 'Nổi bật',
            'icon' => 'ti-star',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => false
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => false
        ],
    ],
    'role' => [
        'id' => [
            'title' => 'ID',
            'icon' => 'ti-id-badge',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'title' => [
            'title' => 'Tên vai trò',
            'icon' => 'ti-user',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'name' => [
            'title' => 'Slug (role_name)',
            'icon' => 'ti-tag',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'guard_name' => [
            'title' => 'Vai trò của nhóm (Guard Name)',
            'icon' => 'ti-shield',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'transaction' => [
        'checkbox' => [
            'title' => '',
            'icon' => 'ti-square',
            'orderable' => false,
            'exportable' => false,
            'width' => '50px',
            'printable' => false,
            'addClass' => 'align-middle text-center',
            'footer' => '<input type="checkbox" class="form-check-input check-all" />',
        ],
        'code' => [
            'title' => 'Mã lệnh',
            'icon' => 'ti-key',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'user' => [
            'title' => 'Người tạo',
            'icon' => 'ti-user',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'amount' => [
            'title' => 'Số tiền',
            'icon' => 'ti-currency-dollar',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'type' => [
            'title' => 'Loại',
            'icon' => 'ti-exchange',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'icon' => 'ti-toggle-right',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'icon' => 'ti-calendar',
            'visible' => false,
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'paid_at' => [
            'title' => 'Ngày thanh toán',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'due_date' => [
            'title' => 'Hạn thanh toán',
            'icon' => 'ti-calendar',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'action' => [
            'title' => 'Thao tác',
            'icon' => 'ti-settings',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
];
