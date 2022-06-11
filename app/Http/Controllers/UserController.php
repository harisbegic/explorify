<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hobby;

class UserController extends Controller
{
    public function show($id) {
    	$user = User::find($id);
    	$hobbies = Hobby::all()->where('user_id', '=', $id);
    	$number = Hobby::all()->where('user_id', '=', $id)->count();
    	return view('users.show')->withUser($user)->withHobbies($hobbies)->withNumber($number);
    }
}
