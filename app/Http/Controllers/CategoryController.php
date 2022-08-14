<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function Category(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Category.category',[
            'last'=>$last,
        ]);
    }

    function CategoryPost(Request $request){
        $request->validate([
            'category_name'=>['required','unique:categories'],
        ]);
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();

        return redirect()->back()->with('message', 'Category Add Successfull!');
    }
}
