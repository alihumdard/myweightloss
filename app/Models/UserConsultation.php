<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_num',
        'next_question',
        'last_question',
        'question_title',
        'question_ans',
        'status',
        'created_by',
        'updated_by',
    ];
}
