<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'team_id', 'match_id', 'point'
    ];

    public function teamName(){
    	return $this->belongsTo('App\Team','team_id');
    }
}
