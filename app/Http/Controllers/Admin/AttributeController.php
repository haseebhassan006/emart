<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Size;

class AttributeController extends Controller
{
    public function index(){

    	
    	return view('admin.attributes.index');
    }


    public function create(){
    	$country = Country::all();
      $state = State::all();
    	return view('admin.attributes.create',['country'=>$country,'state'=>$state]);
    }



    public function addCountry(Request $request){

    	$validator = Validator::make($request->all(), ['country' => 'required']);

       $country = new Country;
       $country->country = $request->country;
       $country->save();



        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function addState(Request $request){

    	$validator = Validator::make($request->all(), ['state' => 'required']);

       $state = new State;
       $state->state = $request->state;
       $state->country_id = $request->country_id;
       $state->save();



        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
    }

      public function addCity(Request $request){

      $validator = Validator::make($request->all(), ['city' => 'required']);

       $city = new City;
       $city->city = $request->city;
       $city->state_id = $request->state_id;
       $city->save();



        if ($validator->passes()) {


      return response()->json(['success'=>'Added new records.']);
        }


      return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function addSize(Request $request){

      $validator = Validator::make($request->all(), ['size' => 'required']);

       $size = new Size;
       $size->size = $request->size;
      
       $size->save();



        if ($validator->passes()) {


      return response()->json(['success'=>'Added new records.']);
        }


      return response()->json(['error'=>$validator->errors()->all()]);
    }

}
