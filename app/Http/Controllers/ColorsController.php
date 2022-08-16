<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colors;
use Illuminate\Support\Str;

class ColorsController extends Controller
{
    function Color(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Attribute.color',[
            'last'=>$last,
        ]);
    }

    function ColorPost(Request $request){
        $request->validate([
            'color_name'=>['required','unique:colors'],
        ]);
        $color=new Colors();
        $color->color_name=$request->color_name;
        $color->save();
        return back()->with('message', 'Color Add Successfull');
    }

}
