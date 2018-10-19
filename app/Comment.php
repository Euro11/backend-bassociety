<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['id','posts_id','comment','count_subcomment','created_at','updated_at'];
}
