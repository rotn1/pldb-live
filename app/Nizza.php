<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nizza extends Model
{
    public function player(){
    	return $this->belongsTo('App\Player', 'player_id');
    }
}