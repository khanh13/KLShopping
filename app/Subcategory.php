<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id', 'subcategory_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
