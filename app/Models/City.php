<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class City extends Model
{
    use HasFactory;
    protected $guarded  = [];


    public function State(){

    	return $this->belongsTo(State::class);
    }
}
