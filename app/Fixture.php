<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
	function home_fantateam() {
		return $this->belongsTo('App\Fantateam', 'home_fantateam_id');
	}

	function away_fantateam() {
		return $this->belongsTo('App\Fantateam', 'away_fantateam_id');
	}

	function matchweek() {
		return $this->belongsTo('App\Matchweek', 'matchweek_id');
	}

}
