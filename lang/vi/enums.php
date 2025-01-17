<?php

use App\Enums\Category\HomeSliderOption;
use App\Enums\DefaultActiveStatus;
use App\Enums\DefaultStatus;
use App\Enums\Evaluation\EvaluationShift;
use App\Enums\Evaluation\EvaluationType;
use App\Enums\FeaturedStatus;
use App\Enums\Notification\NotificationStatus;
use App\Enums\Notification\NotificationType;
use App\Enums\Order\OrderStatus;
use App\Enums\Payment\PaymentMethod;
use App\Enums\Order\PaymentStatus;
use App\Enums\Payment\PaymentType;
use App\Enums\Post\PostStatus;
use App\Enums\PostCategory\PostCategoryStatus;
use App\Enums\Product\{ProductInStock, ProductManagerStock, ProductStatus, ProductType, ProductVariationAction};
use App\Enums\ShiftDepartment\ShiftStatusEnum;
use App\Enums\Slider\SliderStatus;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\User\{Gender, UserVip, UserRoles};

return [
    Gender::class => [
        Gender::Male->value => 'Nam',
        Gender::Female->value => 'Nữ',
        Gender::Other->value => 'Khác',
    ],
    DefaultActiveStatus::class => [
        DefaultActiveStatus::Active->value => 'Có',
        DefaultActiveStatus::UnActive->value => 'Không',
    ],
    NotificationType::class => [
        NotificationType::All->value => 'Tất cả',
        NotificationType::Customer->value => 'Một vài người cụ thể',
    ],
    NotificationStatus::class => [
        NotificationStatus::READ->value => 'Đã đọc',
        NotificationStatus::NOT_READ->value => 'Chưa đọc',
    ],
    PostCategoryStatus::class => [
        PostCategoryStatus::Published => 'Đã xuất bản',
        PostCategoryStatus::Draft => 'Bản nháp',
    ],
    PaymentType::class => [
        PaymentType::Full->value => 'Trả toàn bộ',
        PaymentType::Installment->value => 'Trả góp',
    ],
    PaymentStatus::class => [
        PaymentStatus::UnPaid->value => 'Chưa thanh toán',
        PaymentStatus::Paid->value => 'Đã thanh toán',
    ],
    TransactionStatus::class => [
        TransactionStatus::Pending->value => 'Đang xử lý',
        TransactionStatus::Success->value => 'Thành công',
        TransactionStatus::Failed->value => 'Thất bại',
    ],
    HomeSliderOption::class => [
        HomeSliderOption::Active->value => 'Có',
        HomeSliderOption::InActive->value => 'Không',
    ],
    SliderStatus::class => [
        SliderStatus::Active => 'Đang hoạt động',
        SliderStatus::UnActive => 'Ngưng hoạt động',
    ],
    PostStatus::class => [
        PostStatus::Draft->value => 'Bản nháp',
        PostStatus::Published->value => 'Đã xuất bản',
    ],
    ProductStatus::class => [
        ProductStatus::Active->value => 'Đang hoạt động',
        ProductStatus::InActive->value => 'Ngưng hoạt động',
    ],
    ProductManagerStock::class => [
        ProductManagerStock::Managed->value => 'Có quản lý',
        ProductManagerStock::NotManaged->value => 'Không quản lý',
    ],
    ProductInStock::class => [
        ProductInStock::InStock->value => 'Còn hàng',
        ProductInStock::OutOfStock->value => 'Hết hàng',
    ],
    PaymentMethod::class => [
        PaymentMethod::Online->value => 'Online',
        PaymentMethod::Direct->value => 'Trực tiếp',
    ],
    UserVip::class => [
        UserVip::Default => 'Mặc định',
        UserVip::Bronze => 'Đồng',
        UserVip::Silver => 'Bạc',
        UserVip::Gold => 'Vàng',
        UserVip::Diamond => 'Kim cương',
    ],
    UserRoles::class => [
        UserRoles::Customer->value => 'Khách hàng',
        UserRoles::Driver->value => 'Tài xế',
    ],
    ProductType::class => [
        ProductType::Simple->value => 'Sản phẩm đơn giản',
        ProductType::Variable->value => 'Sản phẩm có biến thể'
    ],
    DefaultStatus::class => array(
        DefaultStatus::Published->value => 'Đã xuất bản',
        DefaultStatus::Draft->value => 'Bản nháp',
        DefaultStatus::Deleted->value => 'Đã xoá',
    ),
    ProductVariationAction::class => [
        ProductVariationAction::AddSimple => 'Thêm biến thể',
        ProductVariationAction::AddFromAllVariations => 'Tạo biến thể từ tất cả thuộc tính'
    ],
    OrderStatus::class => [
        OrderStatus::Pending->value => 'Chờ xác nhận',
        OrderStatus::Confirmed->value => 'Đã xác nhận',
        // OrderStatus::Completed->value => 'Hoàn thành',
        OrderStatus::Cancelled->value => 'Hủy bỏ',
    ],
    FeaturedStatus::class => [
        FeaturedStatus::Featured->value => 'Nổi bật',
        FeaturedStatus::Featureless->value => 'Không nổi bật'
    ],
    EvaluationType::class => [
        EvaluationType::generalDepartment->value => 'Khoa khối nội và khối ngội',
        EvaluationType::emergencyDepartment->value => 'Khoa cấp cứu',
        EvaluationType::intensiveCareDepartment->value => 'Khoa hồi sức'
    ],
    EvaluationShift::class => [
        EvaluationShift::shift_1->value => 'Ca 1 ',
        EvaluationShift::shift_2->value => 'Ca 2',
        EvaluationShift::shift_3->value => 'Ca 3',
        EvaluationShift::day_shift->value => 'Ca Ngày',
        EvaluationShift::night_shift->value => 'Ca Đêm',
    ],
    ShiftStatusEnum::class => [
        ShiftStatusEnum::active->value => 'Hoạt động',
        ShiftStatusEnum::unactive->value => 'Thùng rác'
    ],
];
