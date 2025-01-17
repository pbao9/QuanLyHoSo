<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Admin\Repositories\CategorySystem\CategorySystemRepositoryInterface' => 'App\Admin\Repositories\CategorySystem\CategorySystemRepository',
        'App\Admin\Repositories\Module\ModuleRepositoryInterface' => 'App\Admin\Repositories\Module\ModuleRepository',
        'App\Admin\Repositories\Permission\PermissionRepositoryInterface' => 'App\Admin\Repositories\Permission\PermissionRepository',
        'App\Admin\Repositories\Role\RoleRepositoryInterface' => 'App\Admin\Repositories\Role\RoleRepository',
        'App\Admin\Repositories\Admin\AdminRepositoryInterface' => 'App\Admin\Repositories\Admin\AdminRepository',
        'App\Admin\Repositories\User\UserRepositoryInterface' => 'App\Admin\Repositories\User\UserRepository',
        'App\Admin\Repositories\Category\CategoryRepositoryInterface' => 'App\Admin\Repositories\Category\CategoryRepository',
        'App\Admin\Repositories\Product\ProductRepositoryInterface' => 'App\Admin\Repositories\Product\ProductRepository',
        'App\Admin\Repositories\Product\ProductAttributeRepositoryInterface' => 'App\Admin\Repositories\Product\ProductAttributeRepository',
        'App\Admin\Repositories\Product\ProductVariationRepositoryInterface' => 'App\Admin\Repositories\Product\ProductVariationRepository',
        'App\Admin\Repositories\Attribute\AttributeRepositoryInterface' => 'App\Admin\Repositories\Attribute\AttributeRepository',
        'App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface' => 'App\Admin\Repositories\AttributeVariation\AttributeVariationRepository',
        'App\Admin\Repositories\Order\OrderRepositoryInterface' => 'App\Admin\Repositories\Order\OrderRepository',
        'App\Admin\Repositories\Order\OrderDetailRepositoryInterface' => 'App\Admin\Repositories\Order\OrderDetailRepository',
        'App\Admin\Repositories\Slider\SliderRepositoryInterface' => 'App\Admin\Repositories\Slider\SliderRepository',
        'App\Admin\Repositories\Slider\SliderItemRepositoryInterface' => 'App\Admin\Repositories\Slider\SliderItemRepository',
        'App\Admin\Repositories\Setting\SettingRepositoryInterface' => 'App\Admin\Repositories\Setting\SettingRepository',
        'App\Admin\Repositories\Post\PostRepositoryInterface' => 'App\Admin\Repositories\Post\PostRepository',
        'App\Admin\Repositories\PostCategory\PostCategoryRepositoryInterface' => 'App\Admin\Repositories\PostCategory\PostCategoryRepository',
        'App\Admin\Repositories\Icon\IconRepositoryInterface' => 'App\Admin\Repositories\Icon\IconRepository',
        'App\Admin\Repositories\ShoppingCart\ShoppingCartRepositoryInterface' => 'App\Admin\Repositories\ShoppingCart\ShoppingCartRepository',
        'App\Admin\Repositories\Transaction\TransactionRepositoryInterface' => 'App\Admin\Repositories\Transaction\TransactionRepository',
        'App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepositoryInterface' => 'App\Admin\Repositories\LoggedTransaction\LoggedTransactionRepository',
        'App\Admin\Repositories\Notification\NotificationRepositoryInterface' => 'App\Admin\Repositories\Notification\NotificationRepository',
        'App\Admin\Repositories\InstallmentType\InstallmentTypeRepositoryInterface' => 'App\Admin\Repositories\InstallmentType\InstallmentTypeRepository',
        'App\Admin\Repositories\Product\ProductItemRepositoryInterface' => 'App\Admin\Repositories\Product\ProductItemRepository',
        'App\Admin\Repositories\Evaluation\EvaluationRepositoryInterface' => 'App\Admin\Repositories\Evaluation\EvaluationRepository',
        'App\Admin\Repositories\Department\DepartmentRepositoryInterface' => 'App\Admin\Repositories\Department\DepartmentRepository',
        'App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepositoryInterface' => 'App\Admin\Repositories\EvaluationCriteria\EvaluationCriteriaRepository',
        'App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepositoryInterface' => 'App\Admin\Repositories\EvaluationCategory\EvaluationCategoryRepository',
        'App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepositoryInterface' => 'App\Admin\Repositories\ShiftDepartment\ShiftDepartmentRepository',

    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implement) {
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
