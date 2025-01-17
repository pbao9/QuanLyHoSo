<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeding

        // roles
        DB::table('roles')->insert([
            'title' => 'Super Admin',
            'name' => 'superAdmin',
            'guard_name' => 'admin',
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('roles')->insert([
            'title' => 'Trưởng khoa',
            'name' => 'headOfDepartment',
            'guard_name' => 'admin',
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('roles')->insert([
            'title' => 'Nhân viên',
            'name' => 'employees',
            'guard_name' => 'admin',
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        //modules

        DB::table('modules')->insert([
            'id' => 12,
            'name' => 'QL Thông báo',
            'description' => '<p>QL Thông báo</p>',
            'status' => 2,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('modules')->insert([
            'id' => 13,
            'name' => 'QL Vai trò',
            'description' => '<p>QL Vai trò</p>',
            'status' => 2,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('modules')->insert([
            'id' => 14,
            'name' => 'QL Admin',
            'description' => '<p>QL Admin</p>',
            'status' => 2,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'AppModelsAdmin',
            'model_id' => 1
        ]);

        // permissions
        DB::table('permissions')->insert([
            'title' => 'Đọc tài liệu API',
            'name' => 'readAPIDoc',
            'guard_name' => 'admin',
            'module_id' => null,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        // DB::table('permissions')->insert([
        //     'title' => 'Xem Bài viết',
        //     'name' => 'viewPost',
        //     'guard_name' => 'admin',
        //     'module_id' => 1,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);
        // DB::table('permissions')->insert([
        //     'title' => 'Thêm Bài viết',
        //     'name' => 'createPost',
        //     'guard_name' => 'admin',
        //     'module_id' => 1,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);
        // DB::table('permissions')->insert([
        //     'title' => 'Sửa Bài viết',
        //     'name' => 'updatePost',
        //     'guard_name' => 'admin',
        //     'module_id' => 1,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);
        // DB::table('permissions')->insert([
        //     'title' => 'Xóa Bài viết',
        //     'name' => 'deletePost',
        //     'guard_name' => 'admin',
        //     'module_id' => 1,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);
        // DB::table('permissions')->insert([
        //     'title' => 'Xem Chuyên mục Bài viết',
        //     'name' => 'viewPostCategory',
        //     'guard_name' => 'admin',
        //     'module_id' => 2,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);

        // DB::table('permissions')->insert([
        //     'title' => 'Thêm Chuyên mục Bài viết',
        //     'name' => 'createPostCategory',
        //     'guard_name' => 'admin',
        //     'module_id' => 2,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);

        // DB::table('permissions')->insert([
        //     'title' => 'Sửa Chuyên mục Bài viết',
        //     'name' => 'updatePostCategory',
        //     'guard_name' => 'admin',
        //     'module_id' => 2,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);

        // DB::table('permissions')->insert([
        //     'title' => 'Xóa Chuyên mục Bài viết',
        //     'name' => 'deletePostCategory',
        //     'guard_name' => 'admin',
        //     'module_id' => 2,
        //     'created_at' => DB::raw('NOW()'),
        //     'updated_at' => DB::raw('NOW()')
        // ]);


        DB::table('permissions')->insert([
            'title' => 'Cài đặt chung',
            'name' => 'settingGeneral',
            'guard_name' => 'admin',
            'module_id' => null,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Xem Thông báo',
            'name' => 'viewNotification',
            'guard_name' => 'admin',
            'module_id' => 12,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Thêm Thông báo',
            'name' => 'createNotification',
            'guard_name' => 'admin',
            'module_id' => 12,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);


        DB::table('permissions')->insert([
            'title' => 'Sửa Thông báo',
            'name' => 'updateNotification',
            'guard_name' => 'admin',
            'module_id' => 12,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);


        DB::table('permissions')->insert([
            'title' => 'Xóa Thông báo',
            'name' => 'deleteNotification',
            'guard_name' => 'admin',
            'module_id' => 12,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Xem Vai Trò',
            'name' => 'viewRole',
            'guard_name' => 'admin',
            'module_id' => 13,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Thêm Vai Trò',
            'name' => 'createRole',
            'guard_name' => 'admin',
            'module_id' => 13,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Sửa Vai Trò',
            'name' => 'updateRole',
            'guard_name' => 'admin',
            'module_id' => 13,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Xóa Vai Trò',
            'name' => 'deleteRole',
            'guard_name' => 'admin',
            'module_id' => 13,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Xem Admin',
            'name' => 'viewAdmin',
            'guard_name' => 'admin',
            'module_id' => 14,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Thêm Admin',
            'name' => 'createAdmin',
            'guard_name' => 'admin',
            'module_id' => 14,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Sửa Admin',
            'name' => 'updateAdmin',
            'guard_name' => 'admin',
            'module_id' => 14,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        DB::table('permissions')->insert([
            'title' => 'Xóa Admin',
            'name' => 'deleteAdmin',
            'guard_name' => 'admin',
            'module_id' => 14,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);


        for ($i = 1; $i <= 34; $i++) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $i,
                'role_id' => 1
            ]);
        }

        for ($i = 5; $i <= 8; $i++) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $i,
                'role_id' => 2
            ]);
        }
        for ($i = 5; $i <= 8; $i++) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $i,
                'role_id' => 3
            ]);
        }
        DB::table('role_has_permissions')->insert([
            'permission_id' => 23,
            'role_id' => 2
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 23,
            'role_id' => 3
        ]);
    }
}
