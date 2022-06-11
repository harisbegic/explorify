<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HobbyPhoto extends Model
{
    public function hobby()
    	{
    		return $this->belongsTo('App\Hobby');
    	}
}
