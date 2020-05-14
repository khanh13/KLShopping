<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\Subcategory;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_name',
        'code',
        'quantity',
        'description',
        'detail',
        'price',
        'discount',
        'video_link',
        'main_slider',
        'now_trending',
        'new_releases',
        'best_rated',
        'mid_slider',
        'coming_soon',
        'hot_deal',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'color',
        'size',
        'status'
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
