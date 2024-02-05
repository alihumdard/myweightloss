<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','desc','price', 'qty', 'stock', 'cnn', 'ext_tax','status','created_by','updated_by'];
}
