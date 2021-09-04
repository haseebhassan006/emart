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

   public function searchByPrice(Request $request){
   
   $searchKeyword  = $request->search;
  
   $result = Product::where('price', 'like', '%'.$searchKeyword.'%')->get();

   
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
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $output .= '
    <div class="col s12 m4 l4" id="mainDiv"><div class="card animate fadeLeft" id="proDiv ">
    <div class="card-badge">
    <a class="white-text">
    <b>'.$row->discount_percent.'</b>
    </div>
    <div class="card-content">
    <p>'.$row->name.'</p><span class="card-title text-ellipsis">'.$row->description.'</span>div class="display-flex flex-wrap justify-content-center"><h5 class="mt-3">$'.$row->price.'</h5><img src="http://mauth.test/uploads/'.$row->image.'" class="responsive-img" alt=""> <a class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4"
                href="#modal'.$row->id.'">View</a>
    </div></div></div>';
        
        $last_id = $row->id;
       }
       $output .= '
       <div id="load_more">
        <a type="button" name="load_more_button" class="btn waves-effect" data-id="'.$last_id.'" id="load_more_button">Load More</a>
       
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
     }

     

  
}
