<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){

    	$categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){


        $categories = Category::all();
    	return view('admin.category.create',compact('categories'));
    }


    public function store(Request $request){
        
      $validator = Validator::make($request->all(), [
            'category' => 'required',
            
        ]);
      if ($validator->passes()) {
          $categories = Category::create($request->only('category','slug'));
      $categories->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
       return response()->json(['success'=>'Added new records.']);

          # code...
      }else{
        return response()->json(['error'=>$validator->errors()->all()]);

      }

   /* $categories = new Category;
    $categories->category = $request->category;
    $categories->parent_id = $request->parent_category;
    $categories->save();*/
    
      

    
}


    public function edit(Category $category){
     
    	$categories = Category::where('id','!=', $category->id)->get();

    	return view('admin.category.create',['category'=>$category,'categories'=>$categories]);
    }



    public function update(Request $request, $id){


     $validator = Validator::make($request->all(), [
            'category' => 'required',
         
        ]);
     if ($validator->passes()) {

    $categories = Category::find($id);
    $categories->category = $request->category;
    $categories->slug = $request->slug;
    $categories->parents()->detach();
    $categories->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
    $categories->update();
    return response()->json(['success'=>'Record Updated.']);

         # code...
     }else{

        return response()->json(['error'=>$validator->errors()->all()]);

     }




    }



    public function destroy(Request $request){
    	
    	$id = $request->id;

    	$category = Category::find($id);

    	if ($category->delete()) {

    		return response()->json(['success'=>'Deleted records.']);
    	}

    	return response()->json(['error'=>'something Went Wrong']);
    }
}
