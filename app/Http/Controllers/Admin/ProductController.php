<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
      public function index(){

    	// $categories = Category::with('parent')->get();
    

    	$products = Product::with('categories','brand')->paginate(10);

        return view('admin.product.index', compact('products'));
    }

   public function create(){



        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();


    	return view('admin.product.create',compact('categories','brands','tags'));
    }


    public function store(Request $request){

       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
           
            'category_id' => 'required',
            'tag_id' => 'required',
            'brand_id' => 'required',
        ]);

      $path = 'images/no-thumbnail.jpeg';
      if($request->has('thumbnail')){
        $extension = ".".$request->thumbnail->getClientOriginalExtension();
        $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
        $name = $name.$extension;
        $path = $request->thumbnail->storeAs('images', $name, 'public');
     }
     
      if ($validator->passes()) {
        $product = Product::create([
           'name'=>$request->name,
           'slug' => $request->slug,
           'description'=>$request->description,
           'image' => $path,
           'status' => $request->status,
          
          
           'price' => $request->price,
           'discount_percent'=>$request->discount ? $request->discount : 0,
           'discount_price' => ($request->discount_price) ? $request->discount_price : 0,
           
           'quantity' => $request->quantity,
           'brand_id' => $request->brand_id,
           'tag_id' => $request->tag_id
       ]);
           $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);
           return response()->json(['success'=>'Added new records.']);
      }else{
            return response()->json(['error'=>$validator->errors()->all()]);
       }

     /* $product = Product::create([
           'name'=>$request->name,
           'slug' => $request->slug,
           'description'=>$request->description,
           'image' => $path,
           'status' => $request->status,
          
          
           'price' => $request->price,
           'discount_percent'=>$request->discount ? $request->discount : 0,
           'discount_price' => ($request->discount_price) ? $request->discount_price : 0,
           
           'quantity' => $request->quantity,
           'brand_id' => $request->brand_id,
           'tag_id' => $request->tag_id
       ]);
           if($product){
            $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);
           return response()->json(['success'=>'Added new records.']);
       }else{
            return response()->json(['error'=>$validator->errors()->all()]);
       }*/



    	
    }


    public function edit($id){

    	$product = Product::with('tag','brand','categories')->find($id);
      $categories = Category::all();
      $brands = Brand::all();
      $tags = Tag::all();
    
    	return view('admin.product.edit',compact('product','tags','brands','categories'));
      
    }



    public function update(Request $request,$id){

   

       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'brand_id' => 'required',
          
        ]);


       $product = Product::with('categories')->find($id);

   if($product->image){
            Storage::delete($product->image);
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->storeAs('images', $name);
           $product->image = $path;
         }

         if($validator->passes()){
        $product->name =$request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->image = $path;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->discount_percent = $request->discount ? $request->discount : 0;
        $product->discount_price = ($request->discount_price) ? $request->discount_price : 0;
         $product->quantity = $request->quantity;
           $product->brand_id = $request->brand_id;
           $product->tag_id = $request->tag_id;
        $product->categories()->detach();
        if($product->save()){
            $product->categories()->attach($request->category_id, ['created_at'=>now(), 'updated_at'=>now()]);
            return response()->json(['success'=>'Records Updated.']);
          }
        
        
        
         }else{
          return response()->json(['error'=>$validator->errors()->all()]);

         }
       
    
        


    }



    public function destroy(Request $request){

      $id = $request->id;
     

      $product = Product::with('categories')->find($id);

      $product->categories()->detach();
      $product->forceDelete();
      Storage::delete($product->thumbnail);
      if($product){
            return response()->json(['success'=>'Product Successfully Deleted!']);
                    }else{
            
            return response()->json(['error'=>'Error Deleting Product!']);
        }
      }


}
