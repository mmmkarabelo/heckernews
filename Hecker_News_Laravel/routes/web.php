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


/*
Route::get('/hello' , function(){
    return '<h1>Hello World</h1>';
});
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/v0/newstories', 'NewController@index')->name('newstory');
Route::get('/v0/topstories', 'TopController@index')->name('toptory');
Route::get('/v0/beststories', 'BestController@index')->name('beststory');


Route::resource('/v0/stories' , 'StoryController');
Route::resource('/v0/comments' , 'CommentsController');
Route::resource('/v0/polls' , 'PollsController');
Route::resource('/v0/jobs' , 'JobsController');
Route::resource('/v0/ask' , 'AskController');
// Route::post('/v0/comments/{commentable_id}' , ['uses' =>'CommentsController@store', 'as' => 'comments.store']);



Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
