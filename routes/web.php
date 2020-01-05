<?php

use App\Task;

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
    return view('landing');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/statusChange/{var}/{id}', 'TaskController@changeTaskStatus');

Route::post('/task', 'TaskController@storeNewTask');

Route::get('/task/add', 'TaskController@showAddTask');

Route::get('/task/delete/{id}', 'TaskController@deleteTask'); 

Route::get('/task/edit/{id}', 'TaskController@showEditTask'); 

Route::put('/task/{task}', 'TaskController@editTask');


Route::get('/task/share', 'TaskController@showShareTask');

Route::get('/send-mail', function() {
    
    $tasks = Task::where('user_id', auth()->user()->id)->where('completed_at', NULL)->where('deleted_at', NULL)->get();
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyMail($tasks));
});


Route::get('/user/edit/{id}', 'UserController@edit');

Route::put('/user/{user}', 'UserController@update');


Route::post('/search', 'TaskController@search');