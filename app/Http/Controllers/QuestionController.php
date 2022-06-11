<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Session;

class QuestionController extends Controller
{

    public function store(Request $request)
    {
        $question = new Question;

        $question->content = $request->content;
        $question->hobby_id = $request->hobby_id;
        $question->user_id = $request->user_id;
        $question->save();
        
        Session::flash('success', 'The question was added successfully!');
        return redirect()->back();
    }
}
