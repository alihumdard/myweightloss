<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','main_image','desc','price', 'qty', 'stock', 'cnn', 'ext_tax','status','created_by','updated_by'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}