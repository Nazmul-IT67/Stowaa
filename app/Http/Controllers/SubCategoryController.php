<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    function SubCategory(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.SubCategory.subcategory',[
            'last'=>$last,
            'categorys'=>Category::orderBy('category_name', 'asc')->get(),
        ]);
    }

    function SubCategoryPost(Request $request){
        $request->validate([
            'subcategory_name'=>['required','unique:sub_categories'],
        ]);
        $subcat=new SubCategory();
        $subcat->subcategory_name=$request->subcategory_name;
        $subcat->category_id=$request->category_id;
        $subcat->slug=Str::slug($request->subcategory_name);
        $subcat->save();
        return redirect('subcategory-list')->with('message', 'Category Add Successfull!');
    }

    function SubCategoryEdit($id){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.SubCategory.subcategory-edit',[
            'last'=>$last,
            'subcategory'=>SubCategory::findOrFail($id),
            'categorys'=>Category::all(),
        ]);
    }

    function SubCategoryUpdate(Request $request){
        $request->validate([
            'subcategory_name'=>['required', 'unique:sub_categories'],
        ]);
        $subcategory=SubCategory::findOrFail($request->subcategory_id);
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->category_id=$request->category_id;
        $subcategory->slug=Str::slug($request->subcategory_name);
        $subcategory->save();
        return redirect('subcategory-list')->with('message', 'SubCategory Update Successfull');
    }

    function SubCategoryList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.SubCategory.subcategory-list',[
            'last'=>$last,
            'count'=>$count=SubCategory::count(),
            'subcat'=>SubCategory::paginate(10),
        ]);
    }

    function ChangeStatus($id){
        $getstatus=SubCategory::select('status')->where('id',$id)->first();
        if($getstatus->status==1){
            $status=0;
        }else{
            $status=1;
        }
        SubCategory::where('id',$id)->update(['status'=>$status]);
        return redirect('subcategory-list')->with('message', 'Status Change Successfull');
    }



    function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        return redirect('subcategory-list')->with('message', 'Status Change Successfull');
    }

    function SubCatTrashList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.SubCategory.scat-trash-list',[
            'last'=>$last,
            'subtrash'=>SubCategory::onlyTrashed()->paginate(5),
            'count'=>$count=SubCategory::onlyTrashed()->count(),
        ]);
    }

    function SubCategoryReset($id){
        SubCategory::onlyTrashed()->findOrFail($id)->restore();
        return redirect('subcategory-list')->with('message', 'Status Change Successfull');
    }

    function SubCategoryPDelete($id){
        SubCategory::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect('subcattrash-list')->with('message', 'Status Change Successfull');
    }
}
