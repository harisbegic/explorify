<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
   	public function hobby()
    	{
    		return $this->belongsTo('App\Hobby');
    	}

    	public function user()
    	{
    		return $this->belongsTo('App\User');
    	}
}
