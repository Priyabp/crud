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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','IndexController@showLoginForm');
Route::resource('/test', 'TestController');
// Route::get('/', function ()
// {
// 	return view('user.login');
// });
// Route::get('/','Auth\AuthController@showLoginForm');
Route::post('login','IndexController@login');

// Route::group(['middleware' => ['auth']], function () {
 Route::resource('/test', 'TestController');
 Route::resource('/user', 'UserController');

// });

Route::group(array('prefix'=>'api'),function()
{
    Route::resource('test-user','api\TestAPIController');
});

