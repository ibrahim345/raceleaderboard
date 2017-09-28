<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'ScoresController@RetrieveTimes');


Route::auth();

Route::get('/runners', function () {
    return view('runners');
})->middleware(['auth']);

Route::get('runners', 'RunnerController@GetRunners');
Route::get('runners/edit/{id}',array('uses' => 'RunnerController@EditRunner', 'as' => 'runners'));
Route::post('runners/edit/{id}',array('uses' => 'RunnerController@UpdateRunner', 'as' => 'runners'));
Route::delete('runners/delete/{id}',array('uses' => 'RunnerController@DeleteRunner', 'as' => 'runners'));


Route::get('/create', function () {
    return view('create');
})->middleware(['auth']);

Route::post('create', 'RunnerController@store');




Route::get('/home', 'HomeController@index');
Route::post('/home',array('uses' => 'ScoresController@storetime', 'as' => 'home'));
