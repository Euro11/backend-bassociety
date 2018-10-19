<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id', 'category_id', 'post_title', 'post_description', 'view', 'count_comment','created_at','updated_at'];
}
