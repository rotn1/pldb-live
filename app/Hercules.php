<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hercules extends Model
{
    protected $table = 'herculess';

    public function player(){
    	return $this->belongsTo('App\Player', 'player_id');
    }
}
