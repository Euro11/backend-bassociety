<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $fillable = ['id','date','time','match_type','home_team','scoreHome','away_team','scoreAway'];

    public function getTeamHome(){
    	return $this->hasOne('App\Teams', 'id', 'home_team');
    }

    public function getTeamAway(){
    	return $this->hasOne('App\Teams', 'id', 'away_team');
    }
}
