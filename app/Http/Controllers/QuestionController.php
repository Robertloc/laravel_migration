<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
     function index (){

        $questions = \App\Question::orderBy('created_at', 'desc')
            ->get();

        dd($questions);

        echo 'This is the list of questions';
     }

     function show () {

        $question = Question::find(1);

        $answers = $question->answers()
            ->orderBy('created_at', 'asc')
            ->get();

        dd($answers);
       echo 'This is a detail of a question';
     }
}
