<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['id','title','image','detail','view','vdo','type','created_at'];
    
    public function tags()
    {
    	return $this->belongsToMany('App\Tag','post_id','tag_id');
    }
}
