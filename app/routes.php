<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('queue/receive', function()
{
    return Queue::marshal();

});

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('job','JobController');

Route::resource('photo','PhotoController');


Route::get('iron/create','IronController@create'); //Create a Queue and add subscribers
Route::get('iron/push','IronController@push'); //Push a message to Queue
Route::get('iron/status/{id}','IronController@status'); //Know the status of the message we pushed
Route::post('iron/receive','IronController@receive'); //Receive the message and process it
