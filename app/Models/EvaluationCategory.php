<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCategory extends Model
{
    use HasFactory;

    protected $table = 'evaluation_categories';

    protected $guarded = [];

    public function criteria()
    {
        return $this->hasMany(EvaluationCriteria::class, 'category_id');
    }
}
