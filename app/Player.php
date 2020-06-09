<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'profile_image','jersey_number','country_id','team_id'
    ];

    public function team(){
    	return $this->belongsTo('App\Team');
    }

    public function getCountry(){
    	return $this->belongsTo('App\Country','country_id');
    }
}
