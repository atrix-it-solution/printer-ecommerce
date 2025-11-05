<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'regular_price',
        'sale_price',
        'stock_quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }
}
