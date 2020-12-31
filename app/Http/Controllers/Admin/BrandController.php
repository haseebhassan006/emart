<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Validator;

class BrandController extends Controller
{
      public function index(){

     $brands = Brand::paginate(10);
    	

    	return view('admin.brand.index',compact('brands'));
    }

    public function create(){



        //$categories = Category::with('parent')->get();


    	return view('admin.brand.create');
    }


    public function store(Request $request){

 
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'image' => 'required',
        ]);
    	

       $path = 'images/no-thumbnail.jpeg';
       if($request->has('image')){
       $extension = ".".$request->image->getClientOriginalExtension();
       $name = basename($request->image->getClientOriginalName(), $extension).time();
       $name = $name.$extension;
       $path = $request->image->storeAs('images', $name, 'public');
     }

     if ($validator->passes()) {
       $brands = new Brand;
       $brands->brand = $request->brand;
       $brands->image = $path;
       $brands->save();
       return response()->json(['success'=>'Added new records.']);

       # code...
     }else{
      return response()->json(['error'=>'Error Occured.']);

     }

      




    	
    }


    public function edit($id){

    	$brand = Brand::find($id);
    	return view('admin.brand.create',compact('brand'));
    }



    public function update(Request $request, $id){


     $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'image' => 'required',
        ]);
     if ($validator->passes()) {
      $brand = Brand::find($id);
      $brand->brand = $request->brand;
      $brand->update();
      return response()->json(['success'=>'records Updated.']);

       # code...
     }else{
       return response()->json(['error'=>$validator->errors()->all()]);
     }

    }



    public function destroy(Request $request){
    	
    	$id = $request->id;

    	$brand = brand::find($id);

    	if ($brand->delete()) {

    		return response()->json(['success'=>'Deleted records.']);
    	}

    	return response()->json(['error'=>'something Went Wrong']);
    }
}
