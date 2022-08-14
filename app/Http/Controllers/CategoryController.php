<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

        return redirect('category-list')->with('message', 'Category Add Successfull!');
    }

    function CategoryList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Category.category-list',[
            'last'=>$last,
            'category'=>Category::paginate(10),
            'count'=>$count=Category::count(),
        ]);
    }

    function ChangeStatus($id){
        $getstatus=Category::select('status')->where('id',$id)->first();
        if($getstatus->status==1){
            $status=0;
        }else{
            $status=1;
        }
        Category::where('id',$id)->update(['status'=>$status]);
        return redirect('category-list')->with('message', 'Status Change Successfull');
    }

    function CategoryEdit($id){
        return view('Backend.Category.category-edit',[
            'category'=>Category::findOrFail($id),
        ]);
    }

    function CategoryUpdate(Request $request){
        $request->validate([
            'category_name'=>['required', 'unique:categories'],
        ]);
        Category::findOrFail($request->category_id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect('category-list')->with('message', 'Category Update Successfull');
    }

    function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        return redirect('category-list')->with('message', 'Deleted Successfull');
    }

    function CatTrashList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Category.cat-trash-list',[
            'last'=>$last,
            'category'=>Category::onlyTrashed()->paginate(5),
            'count'=>$count=Category::onlyTrashed()->count(),
        ]);
    }

    function CategoryReset($id){
        $cat=Category::onlyTrashed()->findOrFail($id)->restore();
        return redirect('category-list')->with('message', 'Reset Successfull');
    }

    function DelPermanently($id){
        $cat=Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect('cat-trash-list')->with('message', 'Deleted Successfull');
    }
}
