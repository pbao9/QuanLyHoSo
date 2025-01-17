<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationDetail extends Model
{
    use HasFactory;
    protected $table = 'evaluation_details';
    protected $guarded = [];

    // public function evaluation()
    // {
    //     return $this->belongsTo(Evaluations::class, 'evaluation_id');
    // }

    // public function criteria()
    // {
    //     return $this->belongsTo(EvaluationCriteria::class, 'criteria_id');
    // }

}
