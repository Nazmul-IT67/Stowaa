<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use Illuminate\Support\Str;

class BrandsController extends Controller
{
    function Brand(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Attribute.brand',[
            'last'=>$last,
        ]);
    }

    function BrandPost(Request $request){
        $request->validate([
            'brand_name'=>['required','unique:brands'],
        ]);
        $brand=new Brands();
        $brand->brand_name=$request->brand_name;
        $brand->save();
        return back()->with('message', 'Brand Add Successfull');
    }
}
