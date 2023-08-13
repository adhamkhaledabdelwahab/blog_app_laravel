<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class Category extends Model
{
    use HasFactory;

    public function blogPost()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    protected static function booted()
    {
        static::deleting(
            function ($category) {
                $category->blogPost()->delete();
            }
        );
    }
}
