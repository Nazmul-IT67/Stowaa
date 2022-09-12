<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    function category(){
        return $this->belongsTo(Category::class);
    }

    function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    function cart(){
        return $this->hasMany(Cart::class,'product_id');
    }

    function ProductGallery(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
