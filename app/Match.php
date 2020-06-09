<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'team_id_home', 'team_id_away', 'status','result'
    ];

    public function getHomeTeam(){
    	return $this->belongsTo('App\Team','team_id_home');
    }

    public function getAwayTeam(){
    	return $this->belongsTo('App\Team','team_id_away');
    }

    public function getWinnerTeam(){
    	return $this->belongsTo('App\Team','result');
    }
}
