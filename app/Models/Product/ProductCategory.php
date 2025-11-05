<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
     protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    
    public function products()
    {
        return $this->belongsToMany(Blog::class, 'product_product_category');
    }
}
