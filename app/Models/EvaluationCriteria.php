<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvaluationCriteria extends Model
{
    use HasFactory;

    protected $table = 'evaluation_criterias';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(EvaluationCategory::class, 'category_id', 'id');
    }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluations::class, 'evaluation_details')
            ->withPivot('status', 'note')
            ->withTimestamps();
    }

    
    public function details()
    {
        return $this->belongsToMany(
            EvaluationCriteria::class,
            'evaluation_details',
            'criteria_id',
            'evaluation_id',
        )->withPivot('status');
    }
}
