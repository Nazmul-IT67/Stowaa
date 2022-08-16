<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    function Size(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Attribute.size',[
            'last'=>$last,
        ]);
    }

    function SizePost(Request $request){
        $request->validate([
            'size_name'=>['required','unique:sizes'],
        ]);
        $size=new Size();
        $size->size_name=$request->size_name;
        $size->save();
        return back()->with('message', 'Size Add Successfull');
    }
}
