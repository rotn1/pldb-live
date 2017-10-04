<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fantateam extends Model
{
    function home_match() {
        return $this->hasMany('App\Fixture', 'home_fantateam_id');
    }

    function away_match() {
        return $this->hasMany('App\Fixture', 'away_fantateam_id');
    }

    function players() {
    	return $this->hasMany('App\Player', 'fantateam_id');
    }

    function captain() {
    	return $this->belongsTo('App\Player', 'captain_id');
    }

    function vicecaptain() {
    	return $this->belongsTo('App\Player', 'vicecaptain_id');
    }
}
