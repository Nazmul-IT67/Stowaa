<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frontend;
use App\Models\Products;
use App\Models\Cart;
use App\Models\ProductAttribute;
use App\Models\Size;

class FrontendController extends Controller
{
    function Fontend(){
        return view('Frontend.index',[
            'products'=>Products::all(),
        ]);
    }

    function SingleProduct($slug){
        $products=Products::where('slug', $slug)->first();
        $attribute=ProductAttribute::where('product_id', $products->id)->get();
        $collect=collect($attribute);
        $groupby=$collect->groupBy('color_id');
        return view('Frontend.Page.single-product',[
            'products'=>$products,
            'groupby' =>$groupby,
        ]);
    }

    function ProductPage(){
        $products= Products::all();
        return view('Frontend.Page.product-page',[
            'products'=>$products,
        ]);
    }


}
