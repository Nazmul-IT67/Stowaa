<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\Products;

class CartController extends Controller
{
    function SingleCart($slug, Request $request){
        $old_cookie=$request->cookie('cookie_id');
        if($old_cookie){
            $generate=$old_cookie;
        }else{
            $times=49200;
            $generate= Str::random(10);
            Cookie::queue('cookie_id',$generate, $times);
        }

        $product_id=Products::where('slug', $slug)->first()->id;
        $cart=Cart::where('product_id',$product_id)->where('cookie_id',$generate);
        if($cart->exists()){
            $cart->increment('quantity');
        }else{
            $cart=new Cart();
            $cart->cookie_id=$generate;
            $cart->product_id=$product_id;
            $cart->save();
        }
        return back();
    }

    function CartPage(Request $request){
        $old_cookie=$request->cookie('cookie_id');
        $carts=Cart::where('cookie_id',$old_cookie)->get();
        return view('Frontend.Page.cart-page',[
            'carts'=>$carts,
        ]);
    }
}
