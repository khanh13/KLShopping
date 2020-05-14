<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
