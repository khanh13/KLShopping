<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;
use App\Product;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
