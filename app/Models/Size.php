<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    function attribute(){
        return $this->belongsTo(ProductAttribute::class, 'size_id');
    }

    function size(){
        return $this->hasMany(Size::class, 'size_id');
    }

}
