<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use Session;

class SuggestionController extends Controller
{

    public function store(Request $request)
    {
        $suggestion = new Suggestion;

        $suggestion->content = $request->content;
        $suggestion->hobby_id = $request->hobby_id;
        $suggestion->user_id = $request->user_id;
        $suggestion->save();
        
        Session::flash('success', 'The suggestion was added successfully!');
        return redirect()->back();
    }
}
