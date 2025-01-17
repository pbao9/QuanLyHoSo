<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentType extends Model
{
    use HasFactory;

    protected $table = 'installment_types';

    protected $guarded = [];
}
