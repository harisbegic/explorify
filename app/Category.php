<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Category extends Model
{
    protected $table = 'categories';

    public function hobby()
    {
    	return $this->hasMany('App\Hobby');
    }
}
