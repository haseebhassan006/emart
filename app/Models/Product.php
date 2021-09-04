<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;


class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function categories(){
    	return $this->belongsToMany(Category::class,'category_products');
    }



    public function brand(){

    	return $this->belongsTo(Brand::class);
    }


    public function tag(){
    	return $this->belongsTo(Tag::class);
    }

    
}
