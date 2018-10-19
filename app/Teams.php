<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $table = 'teams';
    protected $fillable = ['id','team_name','team_logo','type'];
}
