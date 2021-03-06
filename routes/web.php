<?php

use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/home/{key}', 'HomeController@categorigeTask');

Route::get('/statusChange/{var}/{id}', 'TaskController@changeTaskStatus');

Route::get('/task/back', 'TaskController@showTasksbckup');

Route::any('/task/show', 'TaskController@showTasks');

Route::get('/task/show/{key}', 'TaskController@categorigeTask');

Route::post('/task', 'TaskController@storeNewTask');

Route::get('/task/add', 'TaskController@showAddTask');

Route::get('/task/delete/{id}', 'TaskController@deleteTask'); 

Route::get('/task/edit/{id}', 'TaskController@showEditTask'); 

Route::put('/task/{task}', 'TaskController@editTask');

Route::get('/task/share', 'TaskController@showShareTask');

Route::get('/send-mail', 'TaskController@shareTask'); 

Route::get('/user/edit/{id}', 'UserController@edit');

Route::put('/user/{user}', 'UserController@update');

Route::get('/user/show', 'UserController@showUsers');

Route::get('/user/add', 'UserController@addUsers');

Route::post('/user/add-new', 'UserController@addNewUser');

Route::get('/users/edit/{id}', 'UserController@editUser');

Route::put('/users/{user}', 'UserController@updateUser');

Route::get('/users/delete/{id}', 'UserController@deleteUser');

Route::resource('category', 'CategoryController');

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});


//Route::post('/search', 'HomeController@search');

Route::get('/contact', 'contactController@show');

Route::post('/contact', 'contactController@store');



Route::get('/payment/create', 'PaymentController@create')->middleware('auth');
Route::post('/payment', 'PaymentController@store')->middleware('auth');

Route::get('/notification', 'UserNotificationController@show')->middleware('auth');


Route::group(["middleware"=>"IsAdmin"], function() {
    Route::resource('admin/users', 'UserAdminController');
});

Route::get('/admin', function() {
    return view('admin.users.index');
});

Route::get('/imgUpload', function () {
    return view('img-upload');
});

Route::post('/upload', 'MediaController@upload');