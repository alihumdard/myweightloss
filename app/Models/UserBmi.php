<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBmi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bmi',
        'weight',
        'height',
        'age',
        'gender',
        'status',
        'created_by',
        'updated_by',
    ];
}
