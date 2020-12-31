<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\State;

class Category extends Model
{
    use HasFactory;

      protected $fillable = [
        'category','slug',
      
    ];

   public function parents(){
   	return $this->belongsToMany(Category::class,'category_parents' ,'category_id','parent_id');
   }
    public function children(){

    	return $this->belongsToMany(Category::class,'category_parents','parent_id','category_id');
    }

    


    public function products(){
      return $this->belongsToMany(Product::class,'category_products');
    }


    public function state(){
      return $this->hasMany(State::class);
    }
}
