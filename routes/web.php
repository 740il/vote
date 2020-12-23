<?php

use Illuminate\Support\Facades\Route;

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




Route::get('test', function () {
    return view('test');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('answer','AnswerController');
Route::resource('question','QuestionController');

Route::resource('comment','CommentController');
Route::resource('post','PostController');
Route::resource('votee','VoteController');

//Route::delete('vdeleteote/{id}', 'AnswerController@vdeleteote')->name('vdeleteote');

//Route::get('te', 'AnswerController@test');
Route::post('/vote', 'AnswerController@vote')->name('vote');

//Route::get('vote/{id}','AnswerController@vote')>name('vote');
//Route::post('/vote', 'ElectionsController@vote')->name('vote');

//Route::get('vote', 'AnswerController@vote')->name('vote');



