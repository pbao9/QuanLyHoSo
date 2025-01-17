<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected array $services = [
        'App\Admin\Services\CategorySystem\CategorySystemServiceInterface' => 'App\Admin\Services\CategorySystem\CategorySystemService',
        'App\Admin\Services\Module\ModuleServiceInterface' => 'App\Admin\Services\Module\ModuleService',
        'App\Admin\Services\Permission\PermissionServiceInterface' => 'App\Admin\Services\Permission\PermissionService',
        'App\Admin\Services\Role\RoleServiceInterface' => 'App\Admin\Services\Role\RoleService',
        'App\Admin\Services\Admin\AdminServiceInterface' => 'App\Admin\Services\Admin\AdminService',
        'App\Admin\Services\User\UserServiceInterface' => 'App\Admin\Services\User\UserService',
        'App\Admin\Services\Category\CategoryServiceInterface' => 'App\Admin\Services\Category\CategoryService',
        'App\Admin\Services\Product\ProductServiceInterface' => 'App\Admin\Services\Product\ProductService',
        'App\Admin\Services\Attribute\AttributeServiceInterface' => 'App\Admin\Services\Attribute\AttributeService',
        'App\Admin\Services\AttributeVariation\AttributeVariationServiceInterface' => 'App\Admin\Services\AttributeVariation\AttributeVariationService',
        'App\Admin\Services\Order\OrderServiceInterface' => 'App\Admin\Services\Order\OrderService',
        'App\Admin\Services\Slider\SliderServiceInterface' => 'App\Admin\Services\Slider\SliderService',
        'App\Admin\Services\Slider\SliderItemServiceInterface' => 'App\Admin\Services\Slider\SliderItemService',
        'App\Admin\Services\Post\PostServiceInterface' => 'App\Admin\Services\Post\PostService',
        'App\Admin\Services\PostCategory\PostCategoryServiceInterface' => 'App\Admin\Services\PostCategory\PostCategoryService',
        'App\Admin\Services\Area\AreaServiceInterface' => 'App\Admin\Services\Area\AreaService',
        'App\Admin\Services\Driver\DriverServiceInterface' => 'App\Admin\Services\Driver\DriverService',
        'App\Admin\Services\Store\Category\StoreCategoryServiceInterface' => 'App\Admin\Services\Store\Category\StoreCategoryService',
        'App\Admin\Services\Store\StoreServiceInterface' => 'App\Admin\Services\Store\StoreService',
        'App\Admin\Services\Notification\NotificationServiceInterface' => 'App\Admin\Services\Notification\NotificationService',
        'App\Admin\Services\Topping\ToppingServiceInterface' => 'App\Admin\Services\Topping\ToppingService',
        'App\Admin\Services\Vehicle\VehicleServiceInterface' => 'App\Admin\Services\Vehicle\VehicleService',
        'App\Admin\Services\Review\ReviewServiceInterface' => 'App\Admin\Services\Review\ReviewService',
        'App\Admin\Services\ShoppingCart\ShoppingCartServiceInterface' => 'App\Admin\Services\ShoppingCart\ShoppingCartService',
        'App\Admin\Services\LoggedTransaction\LoggedTransactionServiceInterface' => 'App\Admin\Services\LoggedTransaction\LoggedTransactionService',
        'App\Admin\Services\InstallmentType\InstallmentTypeServiceInterface' => 'App\Admin\Services\InstallmentType\InstallmentTypeService',
        'App\Admin\Services\Product\ProductItemServiceInterface' => 'App\Admin\Services\Product\ProductItemService',
        'App\Admin\Services\Evaluation\EvaluationServiceInterface' => 'App\Admin\Services\Evaluation\EvaluationService',
        'App\Admin\Services\Department\DepartmentServiceInterface' => 'App\Admin\Services\Department\DepartmentService',
        'App\Admin\Services\EvaluationCategory\EvaluationCategoryServiceInterface' => 'App\Admin\Services\EvaluationCategory\EvaluationCategoryService',
        'App\Admin\Services\EvaluationCriteria\EvaluationCriteriaServiceInterface' => 'App\Admin\Services\EvaluationCriteria\EvaluationCriteriaService',
        'App\Admin\Services\ShiftDepartment\ShiftDepartmentServiceInterface' => 'App\Admin\Services\ShiftDepartment\ShiftDepartmentService',

    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
