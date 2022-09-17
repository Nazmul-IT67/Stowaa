<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\Count;
use App\Models\ProductGallery;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function AddProduct(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Backend.Products.add-product',[
            'last'=>$last,
            'categories'=>Category::orderBy('category_name', 'asc')->get(),
            'colors'=>Color::all(),
            'sizes'=>Size::all(),
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
        $product->summery=$request->summery;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();

        //Thunbnail//
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

        // Miltiple Images
        if($request->hasFile('image')){
            $images=$request->file('image');
            foreach($images as $image){
                $img_ext=$request->title.Str::random(3).'.'.$image->getClientOriginalExtension();
                $path=public_path('Product/Gallerys/'.$product->created_at->format('Y/m/').$product->id.'/');
                File::makeDirectory($path, $mode=0777, true, true);
                Image::make($image)->save($path.$img_ext);
                $img=new ProductGallery;
                $img->product_gallery=$img_ext;
                $img->product_id=$product->id;
                $img->save();
            }
        }
        // Product Attribute
        $color_id=$request->color_id;
        $size_id=$request->size_id;
        $quantity=$request->quantity;
        $product_price=$request->product_price;

        for($i=0; $i<count($color_id); $i++){
            $data=[
                'product_id'=>$product->id,
                'color_id'=>$color_id[$i],
                'size_id'=>$size_id[$i],
                'quantity'=>$quantity[$i],
                'product_price'=>$product_price[$i],
            ];
            DB::table('product_attributes')->insert($data);
        }

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
