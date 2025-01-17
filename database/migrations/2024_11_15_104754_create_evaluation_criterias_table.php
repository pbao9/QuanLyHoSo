<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_criterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->foreign('category_id')->references('id')->on('evaluation_categories')->onDelete('cascade');
            $table->timestamps();
        });


        // module Đánh giá Tiêu chí
        $module_id = DB::table('modules')->insertGetId([
            'name' => 'Quản lý Đánh giá Tiêu chí',
            'description' => '<p>Quản lý Đánh giá Tiêu chí</p>',
            'status' => 2,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        // Permission của module Đánh giá Tiêu chí
        DB::table('permissions')->insert([
            'title' => 'Xem Đánh giá Tiêu chí',
            'name' => 'viewEvaluationCriteria',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Thêm Đánh giá Tiêu chí',
            'name' => 'createEvaluationCriteria',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Sửa Đánh giá Tiêu chí',
            'name' => 'updateEvaluationCriteria',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Xóa Đánh giá Tiêu chí',
            'name' => 'deleteEvaluationCriteria',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_criterias');
    }
};
