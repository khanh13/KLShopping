<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blogcategory;
class Blog extends Model
{
    protected $fillable = [
        'category_id', 'title_en', 'title_vi', 'image', 'details_en', 'details_vi'
    ];

    public function blogcategory()
    {
        return $this->belongsTo(Blogcategory::class);
    }
}
