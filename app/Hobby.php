<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';

	public function category()
    	{
    		return $this->belongsTo('App\Category');
    	}

    	public function question()
    	{
    		return $this->hasMany('App\Question');
    	}

    	public function suggestion()
    	{
    		return $this->hasMany('App\Suggestion');
    	}

    	public function user()
    	{
    		return $this->belongsTo('App\User');
    	}

        public function hobby_photo()
        {
                return $this->hasMany('App\HobbyPhoto');
        }

}
