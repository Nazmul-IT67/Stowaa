<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frontend;
use App\Models\Products;
use App\Models\Colors;
use App\Models\Size;
use App\Models\Cart;

class FrontendController extends Controller
{
    function Fontend(){
        return view('Frontend.index',[
            'products'=>Products::all(),
            'color'=>Colors::all(),
            'size'=>Size::all(),
        ]);
    }

    function SingleProduct($slug){
        return view('Frontend.Page.single-product',[
            'products'=>Products::where('slug', $slug)->first(),
            'color'=>Colors::all(),
            'size'=>Size::all(),
        ]);
    }

    function ProductPage(){
        return view('Frontend.Page.product-page',[
            'products'=>Products::all(),
            'color'=>Colors::all(),
            'size'=>Size::all(),
        ]);
    }

}
