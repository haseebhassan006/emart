<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
    	$tags = Tag::paginate(10);
    	return view('admin.tag.index',compact('tags'));
    }

    public function create(){



        //$categories = Category::with('parent')->get();


    	return view('admin.tag.create');
    }


    public function store(Request $request){

 

    	  $validator = Validator::make($request->all(), [
            'category' => 'required',
         
        ]);



        if ($validator->passes()) {

       $tag = new Tag;
       $tag->name = $request->tag;
       $tag->save();



			return response()->json(['success'=>'Added new records.']);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);

        }


    	
    }


    public function edit($id){

    	$tag = Tag::find($id);
    	return view('admin.tag.create',compact('tag'));
    }



    public function update(Request $request, $id){


    $validator = Validator::make($request->all(), ['tag' => 'required']);

    
    $tag = Tag::find($id);
    $tag->name = $request->tag;
    
    $tag->update();



        if ($validator->passes()) {


            return response()->json(['success'=>'records Updated.']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);


    }



    public function destroy(Request $request){
    	
    	$id = $request->id;

    	$tag = Tag::find($id);

    	if ($tag->delete()) {

    		return response()->json(['success'=>'Deleted records.']);
    	}

    	return response()->json(['error'=>'something Went Wrong']);
    }

}
