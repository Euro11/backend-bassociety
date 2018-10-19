<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	// public function SportSci(){

 //    	return $this->belongsTo('App\SportSci');
 //    }

    public function posts()
    {
    	return $this->belongsToMany('App\News');
    }
}
