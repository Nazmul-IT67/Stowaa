<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\Brands;
use App\Models\Colors;
use App\Models\Size;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\Count;

class ProductsController extends Controller
{
    function AddProduct(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Products.add-product',[
            'last'=>$last,
            'categories'=>Category::orderBy('category_name', 'asc')->get(),
            'brand'=>Brands::orderBy('brand_name', 'asc')->get(),
        ]);
    }

    function SubCat($id){
        $sub_cat=SubCategory::where('category_id', $id)->get();
        return response()->json($sub_cat);
    }

    function ProductPost(Request $request){
        $request->validate([
            'product_title'=>['required', 'unique:products'],
            'slug'=>['required'],
            'summery'=>['required'],
            'description'=>['required'],
            'price'=>['required'],
            'thumbnail'=>['required','image'],
        ]);
        $product=new Products();
        $product->product_title=$request->product_title;
        $product->slug=$request->slug;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->brand_id=$request->brand_id;
        $product->summery=$request->summery;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();

        if($request->hasFile('thumbnail')){
            $image=$request->file('thumbnail');
            $ext=$request->product_title.'.'.$image->getClientOriginalExtension();
            $new=Products::findOrFail($product->id);
            $location=public_path('Product/Thumbnail/'.$new->created_at->format('Y/m/').$new->id.'/');
            File::makeDirectory($location, $mode=0777, true, true);
            Image::make($image)->save($location.$ext);
            $new->thumbnail=$ext;
            $new->save();
        };
        return redirect('product-list')->with('message', 'Product Add Successfull!');
    }

    function ProductList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Products.product-list',[
            'last'=>$last,
            'count'=>$count=Products::count(),
            'product'=>Products::orderBy('product_title','asc')->paginate(),
        ]);
    }

    function ChangeStatus($id){
        $getstatus=Products::select('status')->where('id',$id)->first();
        if($getstatus->status==1){
            $status=0;
        }else{
            $status=1;
        }
        Products::where('id',$id)->update(['status'=>$status]);
        return redirect('product-list')->with('message', 'Status Change Successfull');
    }
}
