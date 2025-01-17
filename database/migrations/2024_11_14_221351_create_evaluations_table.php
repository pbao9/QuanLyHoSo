<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('department_id'); // Khoa khối nội và khối ngoại, Khoa hồi sức. Khoa Cấp cứu
            $table->unsignedBigInteger('shift_id')->nullable(); // Ca làm việc, ví dụ: 'Ca 1', 'Ca ngày'
            $table->string('supervisor', 255)->nullable(); // Người giám sát
            $table->integer('total_nurses')->default(0)->nullable(); // Tổng số điều dưỡng của khoa

            // Chỉ số điều dưỡng
            $table->integer('direct_care_nurses')->default(0)->nullable(); // Điều dưỡng trực tiếp chăm sóc NB
            $table->integer('administrative_nurses')->default(0)->nullable(); // Điều dưỡng hành chính (thuốc/thực chi/vòng ngoài)
            $table->integer('procedure_room_nurses')->default(0); // Điều dưỡng ở phòng thủ thuật (chỉ cho khối nội và ngoại)
            $table->integer('clinic_nurses')->default(0)->nullable(); // Điều dưỡng ở phòng khám (chỉ cho khối nội và ngoại)
            $table->integer('shift_nurses')->default(0)->nullable(); // Điều dưỡng trực
            $table->string('leave_nurses', 50)->nullable(); // Điều dưỡng ra trực/nghỉ phép/nghỉ bù/thai sản/ốm/học

            // Thông tin giường bệnh và bệnh nhân
            $table->integer('total_beds')->nullable(); // Tổng số giường thực kê (chỉ cho khoa hồi sức và khối nội và ngoại)
            $table->integer('total_patients')->default(0)->nullable(); // Tổng số NB

            // Khoa hồi sức
            $table->integer('patients_admitted')->nullable(); // Số NB nhập khoa
            $table->string('patients_transferred_discharged', 50)->nullable(); // Số NB chuyển khoa/xuất viện
            $table->integer('critical_patients_home')->nullable(); // Số NB nặng xin về
            $table->integer('patient_deaths')->nullable(); // Số NB tử vong

            // Khoa cấp cứu
            $table->integer('triage_I_patients')->nullable(); // Số NB phân loại triage I
            $table->integer('triage_II_patients')->nullable(); // Số NB phân loại triage II
            $table->integer('admitted_patients')->nullable(); // Số NB nhập viện
            $table->string('critical_transfers', 50)->nullable(); // Số NB chuyển khoa HSTC-CĐ/PTGMHS/DSA

            // Khoa nội và ngoại
            $table->integer('level_1_patients')->nullable(); // NB chăm sóc cấp I
            $table->integer('level_2_patients')->nullable(); // NB chăm sóc cấp II
            $table->integer('level_3_patients')->nullable(); // NB chăm sóc cấp III
            $table->integer('scheduled_surgeries')->nullable(); // NB phẫu thuật chương trình
            $table->integer('emergency_surgeries')->nullable(); // NB mổ cấp cứu
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('department_shifts')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });


        // module Đánh giá
        $module_id = DB::table('modules')->insertGetId([
            'name' => 'Quản lý Đánh giá',
            'description' => '<p>Quản lý Đánh giá</p>',
            'status' => 2,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);

        // Permission của module Đánh giá
        DB::table('permissions')->insert([
            'title' => 'Xem Đánh giá',
            'name' => 'viewEvaluation',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Thêm Đánh giá',
            'name' => 'createEvaluation',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Sửa Đánh giá',
            'name' => 'updateEvaluation',
            'guard_name' => 'admin',
            'module_id' => $module_id,
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()')
        ]);
        DB::table('permissions')->insert([
            'title' => 'Xóa Đánh giá',
            'name' => 'deleteEvaluation',
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
        Schema::dropIfExists('evaluations');
    }
};
