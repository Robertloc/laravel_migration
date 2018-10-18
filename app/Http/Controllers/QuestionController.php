<?php

namespace App\Http\Controllers;
use DB;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
     public function index (){

        $questions = \App\Question::withCount('answers')
        ->orderBy('created_at', 'desc')
            ->get();

      

      

        $view = view('questions/index', ['questions'=>$questions]);

        return $view;
     }

    public function show () {


        $question = Question::find(1);

        $answers = $question->answers()
            ->orderBy('created_at', 'asc')
            ->get();
       
        return view('questions/show', compact('question', 'answers'));
     }
}
