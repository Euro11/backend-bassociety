<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    protected $table = 'subcomment';
    protected $fillable = ['id','comment_id','comment','created_at','updated_at'];
}
