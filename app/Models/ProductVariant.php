<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductVariant extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'price',
        'value',
        'slug',
        'barcode',
        'sku',
        'image',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'value'
            ]
        ];
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
