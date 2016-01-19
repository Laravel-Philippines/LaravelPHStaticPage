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
******Resource controllers should be at the bottom********
*/
/*
Route::get('/', function () {
    return view('public/frontpage');
});

Route::get('home', function () {
    return view('public/frontpage');
});
*/
Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Forgot Password
Route::controllers([
   'password' => 'Auth\PasswordController',
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Admin Routes

//Members Routes
Route::get('dashboard', [
    'middleware' => 'auth',
    'uses' => 'MemberDashboardController@show'    
]);

//Events Routes
// show new event form
Route::get('new-event',['middleware' => 'auth', 'uses' => 'EventController@create' ]);
// save new event
Route::post('new-event',['middleware' => 'auth', 'uses' => 'EventController@store']);
// edit
Route::get('events/{slug}/edit',['middleware' => 'auth', 'uses' => 'EventController@edit' ]);
Route::post('events/{slug}/edit',['middleware' => 'auth', 'uses' => 'EventController@update' ]);
Route::get('events/{id}/delete',['middleware' => 'auth', 'uses' => 'EventController@destroy' ]);

// Route::get('my-all-events','UserController@user_events_all');

//Jobs Routes
Route::get('new-job',['middleware' => 'auth', 'uses' => 'JobController@create' ]);
Route::post('new-job',['middleware' => 'auth', 'uses' => 'JobController@store']);
Route::get('jobs/{id}/{slug}/edit',['middleware' => 'auth', 'uses' => 'JobController@edit' ]);
Route::post('jobs/{id}/{slug}/edit',['middleware' => 'auth', 'uses' => 'JobController@update' ]);
Route::get('jobs/{id}/delete',['middleware' => 'auth', 'uses' => 'JobController@destroy' ]);