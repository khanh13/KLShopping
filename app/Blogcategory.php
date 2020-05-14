<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Blogcategory extends Model
{
    protected $fillable = [
        'category_name_en', 'category_name_vi'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
