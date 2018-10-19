<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'post_tag';
	public $timestamps = false;
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
