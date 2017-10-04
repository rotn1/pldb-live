<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    function fantateam(){
    	return $this->belongsTo('App\Fantateam', 'fantateam_id');
    }
}
