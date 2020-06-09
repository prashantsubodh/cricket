<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'logo', 'state',
    ];

    public function players(){
    	return $this->hasMany('App\Player');
    }

    public function getState(){
    	return $this->belongsTo('App\State','state');
    }
}
