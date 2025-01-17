<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $guarded = [];


    public function admin()
    {
        return $this->hasMany(Admin::class, 'department_id', 'id');
    }

    public function shifts()
    {
        return $this->hasMany(DepartmentShift::class, 'department_id', 'id');
    }
}
