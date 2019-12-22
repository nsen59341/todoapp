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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statusChange/{var}/{id}', 'TaskController@changeTaskStatus');

Route::post('/task', 'TaskController@storeNewTask');

Route::get('/task/add', 'TaskController@showAddTask');

Route::get('/task/delete/{id}', 'TaskController@deleteTask'); 

Route::get('/task/edit/{id}', 'TaskController@showEditTask'); 

Route::put('/task/{task}', 'TaskController@editTask');

