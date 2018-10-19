<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions/create', 'QuestionController@create')->name('question.detail');

Route::post('/questions/create', 'QuestionController@store');




Route::post('/categories/{id}/create', 'CategoryController@create');


Route::get('/questions', 'QuestionController@index')->name('homepage');

Route::get('/questions/{id}', 'QuestionController@show');



Route::get('/categories', 'CategoryController@index');

Route::get('/answers/{id}', 'AnswerController@show');

Route::post('/answers/{id}', 'AnswerController@vote');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
// When the user comes to categories create with the get method, he will be taken to categorycontroller create method, and this route has been defined as categories create so that we can refer to it later by its name

Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
//anything with the ID categories in the database allows you to edit 

Route::post('/categories/create', 'CategoryController@store');
Route::post('/categories/{id}/edit', 'CategoryController@store');
//these are for the post method, and the URLs are the same as the two methods above. Both going to the same method store. 