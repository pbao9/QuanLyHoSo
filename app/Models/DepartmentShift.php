<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentShift extends Model
{
    use HasFactory;

    protected $table = 'department_shifts';

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id')
            ->orderBy('id', 'asc');
    }
}
