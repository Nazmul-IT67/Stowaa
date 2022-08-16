<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\Brands;
use App\Models\Colors;
use App\Models\Size;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    function AddProduct(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Products.add-product',[
            'last'=>$last,
            'categorys'=>Category::all(),
            // 'subcategorys'=>SubCategory::all(),
            'brand'=>Brands::all(),
            'color'=>Colors::all(),
            'size'=>Size::all(),
        ]);
    }
}
// product_title
// slug
// category_id
// subcategory_id
// brand_id
// color_id
// size_id
// summery
// description
// price
// thumbnail
// status
