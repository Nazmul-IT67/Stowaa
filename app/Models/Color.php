<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    function attribute(){
        return $this->belongsTo(ProductAttribute::class, 'color_id');
    }

    function cart(){
        return $this->hasMany(Cart::class, 'color_id');
    }
}
