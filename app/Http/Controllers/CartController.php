<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Color;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Size;

class CartController extends Controller
{

    function CartPage(Request $request){
        $old_cookie=$request->cookie('cookie_id');
        $carts=Cart::where('cookie_id',$old_cookie)->get();
        return view('Frontend.Page.cart-page',[
            'carts'=>$carts,
        ]);
    }


    function SingleCart($slug, Request $request){
        $old_cookie=$request->cookie('cookie_id');
        if($old_cookie){
            $generate=$old_cookie;
        }else{
            $times=200;
            $generate= Str::random(10);
            Cookie::queue('cookie_id',$generate, $times);
        }
        $product_id=Products::where('slug', $slug)->first()->id;
        $color_id=Color::where($request->color_id)->first()->id;
        $size_id=Size::where($request->size_id)->first()->id;

        $cart=Cart::where('product_id',$product_id)->where('color_id',$color_id)->where('size_id',$size_id)->where('cookie_id',$generate);
        if($cart->exists()){
            $cart->increment('quantity');
        }else{
            $cart=new Cart();
            $cart->cookie_id=$generate;
            $cart->product_id=$product_id;
            $cart->color_id=$color_id;
            $cart->size_id=$size_id;
            $cart->save();
        }
        return back();
    }

}
