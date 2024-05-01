<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'category_id','main_image','desc','short_desc' ,'price', 'stock', 'SKU', 'barcode', 'ext_tax','status','created_by','updated_by'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function assignedQuestions()
    {
        return $this->hasMany(AssignQuestion::class, 'category_id', 'category_id');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
