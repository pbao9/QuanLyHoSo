<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentShiftRequest;
use App\Http\Requests\UpdateDepartmentShiftRequest;
use App\Models\DepartmentShift;

class DepartmentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentShiftRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentShift  $departmentShift
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentShift $departmentShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartmentShift  $departmentShift
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentShift $departmentShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentShiftRequest  $request
     * @param  \App\Models\DepartmentShift  $departmentShift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentShiftRequest $request, DepartmentShift $departmentShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartmentShift  $departmentShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentShift $departmentShift)
    {
        //
    }
}
