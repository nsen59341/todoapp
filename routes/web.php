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

Route::any('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/home/{key}', 'HomeController@categorigeTask');

Route::get('/statusChange/{var}/{id}', 'TaskController@changeTaskStatus');

Route::post('/task', 'TaskController@storeNewTask');

Route::get('/task/add', 'TaskController@showAddTask');

Route::get('/task/delete/{id}', 'TaskController@deleteTask'); 

Route::get('/task/edit/{id}', 'TaskController@showEditTask'); 

Route::put('/task/{task}', 'TaskController@editTask');

Route::get('/task/share', 'TaskController@showShareTask');

Route::get('/send-mail', 'TaskController@shareTask'); 

Route::get('/user/edit/{id}', 'UserController@edit');

Route::put('/user/{user}', 'UserController@update');


//Route::post('/search', 'HomeController@search');