<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CheckoutController extends Controller
{
    public function index(){
    	 $country_list = DB::table('countrystatecity')
         ->groupBy('country')
         ->get();
    	return view('front.checkout')->with('country_list', $country_list);
    }

    public function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
      $data = DB::table('countrystatecity')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();

       $output = '<option value="" disabled selected>Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
 }


}
