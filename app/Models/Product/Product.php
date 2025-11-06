<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'regular_price',
        'sale_price',
        'sku',
        'stock_quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function featuredImage()
    {
        return $this->belongsTo(Media::class, 'featured_image');
    }

    // Helper method to get image URL
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featuredImage) {
            return Storage::url($this->featuredImage->url);
        }
        return null;
    }

}
