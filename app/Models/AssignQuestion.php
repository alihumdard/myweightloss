<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'question_id',
        'question_title',
        'category_title',
        'status',
        'created_by',
    ];
}
