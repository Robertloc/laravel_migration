<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Vote;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function show() {
        //In the show method of the AnswerController use Eloquent to find an Answer object with the primary key equal to 1
        $answer = Answer::findOrFail(1);

        //In the show method of the AnswerController load the view answers/show and pass the found Answer object into it. Then return the view from the method.
        return view('answers/show', compact('answer'));
    }

    public function vote() {
        $request = request();

        $answer = Answer::find(1);

        $vote = new Vote;
        $vote->answer_id = $answer->id;

        if ($request->input('up')) {
        $vote->vote = 1;
        $answer->rating++; 
        } elseif($request->input('down')) {
        $vote->vote = -1;
        $answer->rating--; 
        }

        $vote->save(); //insert
        $answer->save(); //update 

        return back();
    }
}
