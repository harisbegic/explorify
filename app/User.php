<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function question() 
    {
        return $this->hasMany('App\Question');
    }

    public function suggestion() 
    {
        return $this->hasMany('App\Suggestion');
    }

    public function hobby()
    {
        return $this->hasMany('App\Hobby');
    }
}
