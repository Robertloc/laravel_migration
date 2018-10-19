@extends('questions/layout')

@section('content')

<section id="banner">
    <div class="container">
        <h1>{{ $question->id ? 'Edit question' : 'New question' }}</h1>
        <!-- Ternary Operatory where we edit a previous category or make a new one -->
    </div>
</section>
 
<section>
    <div class="container">
        <br>
        @include('common/messages')
  <!--Define the model that it will be bound to  -->
        {{ Form::model($question) }}
 
            <div class="form-group">
             <!-- form made from form helper libary -->
            

                {{ Form::label('title','title of the question') }}<br>
                 <!-- Name of input field, automatic value of null, giving a class -->
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('text', 'text of the question') }}<br>
                 <!-- Name of input field, automatic value of null, giving a class -->
                {{ Form::text('text', null, ['class' => 'form-control']) }}
            </div>
             <!-- Generates submit button -->
            {{ Form::submit("Save", ['class' => "btn btn-primary"]) }}
             <!-- Basic link to a page generated with the route helper function, what we passed as an argument is the name of the root -->
            <a href="{{ route('question.detail') }}" class="btn">New</a>
  <!--Knows when it should forget about binding to model and start a new form  -->
        {{ Form::close() }}
    </div>
</section>

@endsection