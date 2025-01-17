<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', [App\Admin\Http\Controllers\Home\HomeController::class, 'index']);

// login
Route::controller(App\Admin\Http\Controllers\Auth\LoginController::class)
    ->middleware('guest:admin')
    ->prefix('/dang-nhap')
    ->as('login.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('post');
    });

Route::controller(App\Admin\Http\Controllers\Auth\ResetPasswordController::class)
    ->middleware('guest:admin')
    ->prefix('/quen-mat-khau')
    ->as('forgot-password.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'handle')->name('handle');
        Route::get('/xac-thuc-otp', 'otpConfirm')->name('otpConfirm');
        Route::post('/xac-thuc-otp', 'verifyOTP')->name('verifyOTP');
        Route::get('/xac-thuc-mat-khau', 'resetPassword')->name('resetPassword');
        Route::put('/xac-thuc-mat-khau', 'update')->name('update');
        Route::post('/gui-lai-otp', 'resendOTP')->name('resendOTP');
    });


Route::group(['middleware' => 'admin.auth.admin:admin'], function () {

    Route::prefix('/installment-types')->as('installment-type.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\InstallmentType\InstallmentTypeController::class)->group(function () {

            Route::group(['middleware' => ['permission:createPost', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewPost', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updatePost', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deletePost', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    Route::prefix('/transactions')->as('transaction.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\LoggedTransaction\LoggedTransactionController::class)->group(function () {

            Route::group(['middleware' => ['permission:createPost', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewPost', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updatePost', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deletePost', 'auth:admin']], function () {
                Route::post('/xu-ly-nhieu-ban-ghi', 'actionMultipleRecode')->name('multiple');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    Route::prefix('/posts')->as('post.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Post\PostController::class)->group(function () {
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::delete('/xoa/{id}', 'delete')->name('delete');

           
        });
    });

    Route::prefix('/posts-categories')->as('post_category.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\PostCategory\PostCategoryController::class)->group(function () {
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::delete('/xoa/{id}', 'delete')->name('delete');           
        });
    });

    Route::controller(App\Admin\Http\Controllers\Setting\SettingController::class)
        ->prefix('/settings')
        ->as('setting.')
        ->group(function () {
            Route::group(['middleware' => ['permission:settingGeneral', 'auth:admin']], function () {
                Route::get('/general', 'general')->name('general');
                Route::get('/footer', 'footer')->name('footer');
                Route::get('/contact', 'contact')->name('contact');
                Route::get('/information', 'information')->name('information');
            });
            Route::put('/update', 'update')->name('update');
        });

    Route::prefix('/sliders')->as('slider.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Slider\SliderItemController::class)
            ->as('item.')
            ->group(function () {
                Route::get('/{slider_id}/item/them', 'create')->name('create');
                Route::get('/{slider_id}/item', 'index')->name('index');
                Route::get('/item/sua/{id}', 'edit')->name('edit');
                Route::put('/item/sua', 'update')->name('update');
                Route::post('/item/them', 'store')->name('store');
                Route::delete('/{slider_id}/item/xoa/{id}', 'delete')->name('delete');
            });
        Route::controller(App\Admin\Http\Controllers\Slider\SliderController::class)->group(function () {
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //Order detail
    Route::controller(App\Admin\Http\Controllers\Order\OrderDetailController::class)
        ->prefix('order-detail')
        ->as('order_detail.')
        ->group(function () {
            Route::delete('/delete/{id?}', 'delete')->name('delete');
        });

    //Order
    Route::prefix('/orders')->as('order.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Order\OrderController::class)->group(function () {
            Route::group(['middleware' => ['permission:createOrder', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });

            Route::group(['middleware' => ['permission:viewOrder', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/renting', 'viewRentingOrder')->name('renting_order');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });


            Route::group(['middleware' => ['permission:updateOrder', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteOrder', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });

            Route::get('/render-info-shipping', 'renderInfoShipping')->name('render_info_shipping');
            Route::get('/confirm/{id?}', 'confirm')->name('confirm');
            Route::get('/cancel/{id?}', 'cancel')->name('cancel');
            Route::get('/add-product', 'addProduct')->name('add_product');
            Route::get('/calculate-total-before-save-order', 'calculateTotalBeforeSaveOrder')->name('calculate_total_before_save_order');
        });
    });

    //attributes
    Route::prefix('/attributes')->as('attribute.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\AttributeVariation\AttributeVariationController::class)
            ->as('variation.')
            ->group(function () {
                Route::get('/{attribute_id}/variations/them', 'create')->name('create');
                Route::get('/{attribute_id}/variations', 'index')->name('index');
                Route::get('/variations/sua/{id}', 'edit')->name('edit');
                Route::put('/variations/sua', 'update')->name('update');
                Route::post('/variations/them', 'store')->name('store');
                Route::delete('/{attribute_id}/variations/xoa/{id}', 'delete')->name('delete');
            });
        Route::controller(App\Admin\Http\Controllers\Attribute\AttributeController::class)->group(function () {
            Route::group(['middleware' => ['permission:createProductAttribute', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewProductAttribute', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateProductAttribute', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteProductAttribute', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    //Product
    Route::prefix('/products')->as('product.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Product\ProductItemController::class)
            ->as('item.')
            ->group(function () {
                Route::get('/{product_id}/item/them', 'create')->name('create');
                Route::get('/{product_id}/item', 'index')->name('index');
                Route::get('/item/sua/{id}', 'edit')->name('edit');
                Route::put('/item/sua', 'update')->name('update');
                Route::post('/item/them', 'store')->name('store');
                Route::delete('/{product_id}/item/xoa/{id}', 'delete')->name('delete');
            });
        Route::controller(App\Admin\Http\Controllers\Product\ProductController::class)->group(function () {
            Route::group(['middleware' => ['permission:createProduct', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewProduct', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateProduct', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteProduct', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
        Route::controller(App\Admin\Http\Controllers\Product\ProductAttributeController::class)
            ->prefix('/attributes')
            ->as('attribute.')
            ->group(function () {
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        Route::controller(App\Admin\Http\Controllers\Product\ProductVariationController::class)
            ->prefix('/variations')
            ->as('variation.')
            ->group(function () {
                Route::get('/check', 'check')->name('check');
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
    });

    //Product category
    Route::prefix('/categories')->as('category.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\ProductCategory\ProductCategoryController::class)->group(function () {
            Route::group(['middleware' => ['permission:createProductCategory', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewProductCategory', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::get('/{id}/products', 'product')->name('product');
            });

            Route::group(['middleware' => ['permission:updateProductCategory', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteProductCategory', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    //notification
    Route::prefix('/thong-bao')->as('notification.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Notification\NotificationController::class)->group(function () {
            Route::group(['middleware' => ['permission:createNotification', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewNotification', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::get('/admin', 'getAllNotificationAdmin')->name('getAllNotificationAdmin');
                Route::get('/read-all', 'readAllNotification')->name('readAllNotification');
            });

            Route::group(['middleware' => ['permission:updateNotification', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteNotification', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    Route::prefix('/phong-khoa')->as('department.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Department\DepartmentController::class)->group(function () {
            Route::group(['middleware' => ['permission:createDepartment', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewDepartment', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                // Route::get('/ca-lam-viec', 'shifts')->name('shifts');
                Route::get('/khoa/{id}', 'getDepartment')->name('get_slug_department');

                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateDepartment', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteDepartment', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });

        Route::controller(App\Admin\Http\Controllers\Department\Shift\ShiftController::class)
            ->prefix('/{department_id}/ca-lam-viec')
            ->as('shifts.')
            ->group(function () {

                Route::group(['middleware' => ['permission:createDepartment', 'auth:admin']], function () {
                    Route::get('/them', 'create')->name('create');
                    Route::post('/them', 'store')->name('store');
                });
                Route::group(['middleware' => ['permission:viewDepartment', 'auth:admin']], function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/sua/{id}', 'edit')->name('edit');
                });

                Route::group(['middleware' => ['permission:updateDepartment', 'auth:admin']], function () {
                    Route::put('/sua', 'update')->name('update');
                });

                Route::group(['middleware' => ['permission:deleteDepartment', 'auth:admin']], function () {
                    Route::delete('/xoa/{id}', 'delete')->name('delete');
                });
            });
    });

    Route::prefix('/danh-gia')->as('evaluation.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Evaluation\EvaluationController::class)->group(function () {
            Route::group(['middleware' => ['permission:createEvaluation', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewEvaluation', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::get('/ca-lam-viec', 'getShiftsByDepartment')->name('get_shifts_by_department');
            });

            Route::group(['middleware' => ['permission:updateEvaluation', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteEvaluation', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });

        Route::controller(App\Admin\Http\Controllers\Evaluation\EvaluationCategoriesController::class)
            ->prefix('/chuyen-muc')
            ->as('category.')
            ->group(function () {
                Route::group(['middleware' => ['permission:createEvaluationCategory', 'auth:admin']], function () {
                    Route::get('/them', 'create')->name('create');
                    Route::post('/them', 'store')->name('store'); // Đúng route name
                });
                Route::group(['middleware' => ['permission:viewEvaluationCategory', 'auth:admin']], function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/sua/{id}', 'edit')->name('edit');
                });
                Route::group(['middleware' => ['permission:updateEvaluationCategory', 'auth:admin']], function () {
                    Route::put('/sua', 'update')->name('update');
                });
                Route::group(['middleware' => ['permission:deleteEvaluationCategory', 'auth:admin']], function () {
                    Route::delete('/xoa/{id}', 'delete')->name('delete');
                });
            });

        Route::controller(App\Admin\Http\Controllers\Evaluation\EvaluationCriteriaController::class)
            ->prefix('/chuyen-muc/{category_id}/tieu-chi')
            ->as('category.criteria.')
            ->group(function () {
                Route::group(['middleware' => ['permission:createEvaluationCriteria', 'auth:admin']], function () {
                    Route::get('/them', 'create')->name('create');
                    Route::post('/them', 'store')->name('store');
                });
                Route::group(['middleware' => ['permission:viewEvaluationCriteria', 'auth:admin']], function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/sua/{id}', 'edit')->name('edit');
                });
                Route::group(['middleware' => ['permission:updateEvaluationCriteria', 'auth:admin']], function () {
                    Route::put('/sua', 'update')->name('update');
                });
                Route::group(['middleware' => ['permission:deleteEvaluationCriteria', 'auth:admin']], function () {
                    Route::delete('/xoa/{id}', 'delete')->name('delete');
                });
            });
    });

    //admin
    Route::prefix('/nhan-su')->as('admin.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Admin\AdminController::class)->group(function () {
            Route::group(['middleware' => ['permission:createAdmin', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewAdmin', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateAdmin', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteAdmin', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    //role
    Route::prefix('/role')->as('role.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Role\RoleController::class)->group(function () {

            Route::group(['middleware' => ['permission:createRole', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewRole', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateRole', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteRole', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    //user
    Route::prefix('/users')->as('user.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\User\UserController::class)->group(function () {
            Route::group(['middleware' => ['permission:createUser', 'auth:admin']], function () {
                Route::get('/them', 'create')->name('create');
                Route::post('/them', 'store')->name('store');
            });
            Route::group(['middleware' => ['permission:viewUser', 'auth:admin']], function () {
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
            });

            Route::group(['middleware' => ['permission:updateUser', 'auth:admin']], function () {
                Route::put('/sua', 'update')->name('update');
            });

            Route::group(['middleware' => ['permission:deleteUser', 'auth:admin']], function () {
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
    });

    //ckfinder
    Route::prefix('/quan-ly-file')->as('ckfinder.')->group(function () {
        Route::any('/ket-noi', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
            ->name('connector');
        Route::any('/duyet', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
            ->name('browser');
    });
    Route::get('/dashboard', [App\Admin\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //auth
    Route::controller(App\Admin\Http\Controllers\Auth\ProfileController::class)
        ->prefix('/profile')
        ->as('profile.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });

    Route::controller(App\Admin\Http\Controllers\Auth\ChangePasswordController::class)
        ->prefix('/password')
        ->as('password.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });
    Route::prefix('/search')->as('search.')->group(function () {
        Route::prefix('/select')->as('select.')->group(function () {
            Route::get('/icon', [App\Admin\Http\Controllers\Icon\IconSearchSelectController::class, 'selectSearch'])->name('icon');
            Route::get('/admin', [App\Admin\Http\Controllers\Admin\AdminSearchSelectController::class, 'selectSearch'])->name('admin');
            Route::get('/user', [App\Admin\Http\Controllers\User\UserSearchSelectController::class, 'selectSearch'])->name('user');
            Route::get('/product', [App\Admin\Http\Controllers\Product\ProductSearchSelectController::class, 'selectSearch'])->name('product');
            Route::get('/order', [App\Admin\Http\Controllers\Order\OrderSearchSelectController::class, 'selectSearch'])->name('order');
        });
        Route::get('/render-product-and-variation', [App\Admin\Http\Controllers\Product\ProductController::class, 'searchRenderProductAndVariationOrder'])->name('render_product_and_variation');
    });

    Route::post('/logout', [App\Admin\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
