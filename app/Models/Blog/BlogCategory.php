<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
     protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category');
    }
}
