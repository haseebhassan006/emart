<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;

class HomePageController extends Controller
{

	public function index(){
    $products = Product::orderBy('id', 'DESC')->paginate(5);
 
    $categories = Category::with('products','children')->get();
   
  
    
     return view('front.home',compact('products','categories'));

	}

  public function search(Request $request){
   
   $searchKeyword  = $request->search;
  
   $result = Category::with('products')->where('category', 'like', '%'.$searchKeyword.'%')->get();

 
   return response()->json($result);


 


  }

	public function categoryWiseProduct(Request $request){

		$id = $request->id;
        $categories = Category::with('products','children')->get();
		$category = Category::where('id',$id)->with('products')->get();
		return view('front.cate_product',compact('category','categories'));
		

	}

	public function loadMoreProduct(Request $request){
		if($request->ajax()){

			if($request->id > 0)
      {
       $data = DB::table('products')
          ->where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }else{
      	   $data = DB::table('products')
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
     }

     return response()->json($data);
	}
  
}
