<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
    protected $guarded = [];


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function details()
    {
        return $this->belongsToMany(
            EvaluationCriteria::class,
            'evaluation_details',
            'evaluation_id',
            'criteria_id'
        )->withPivot('status');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function shift()
    {
        return $this->belongsTo(DepartmentShift::class, 'shift_id');
    }
}
