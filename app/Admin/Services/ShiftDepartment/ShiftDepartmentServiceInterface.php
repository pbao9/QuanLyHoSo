<?php

namespace App\Admin\Services\ShiftDepartment;

use Illuminate\Http\Request;

interface ShiftDepartmentServiceInterface
{
    /**
     * Tạo mới
     *
     * @return mixed
     * @var Illuminate\Http\Request $request
     *
     */
    public function store(Request $request);

    /**
     * Cập nhật
     *
     * @return boolean
     * @var Illuminate\Http\Request $request
     *
     */
    public function update(Request $request);
    public function delete($id);
}
