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

    public function show ($id) {


        $question = Question::findOrFail($id);

        $answers = $question->answers()
            ->orderBy('created_at', 'asc')
            ->get();
       
        return view('questions/show', compact('question', 'answers'));
     }
    
     public function create()
     {
        $question = new Question;
        return view('questions/create')->with(compact('question'));;

     }
     public function store(Request $request)
     {     

        $this->validate($request, [
            'title'=>'required|min:5',
            'text' => 'required'
        ]);
          $question = new Question;

     
        $question->fill($request->only([
            'title',
            'text'
            //allows us to fill the object with multiple pieces of data at once from the 'request.' 
        ]));

        $question->save();

        session()->flash('success_message', 'The category was successfully saved.');


        return redirect()->route('question.detail', ['id' => $question->id]);


        

     }
}
