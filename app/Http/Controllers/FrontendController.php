<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frontend;
use App\Models\Products;
use App\Models\Cart;
use App\Models\ProductAttribute;


class FrontendController extends Controller
{
    function Fontend(){
        return view('Frontend.index',[
            'products'=>Products::all(),
        ]);
    }

    function SingleProduct($slug){
        $products=Products::where('slug', $slug)->first();
        return view('Frontend.Page.single-product',[
            'products'=>$products,
        ]);
    }

    function ProductPage(){
        $products= Products::all();
        return view('Frontend.Page.product-page',[
            'products'=>$products,
        ]);
    }


}
