<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', [ 'uses' => 'PageNavigationController@home', 'as' => 'home' ]);
Route::post('/navigate', [ 'uses' => 'PageNavigationController@navigate', 'as' => 'navigate' ]);
Route::get('/navigated-to', [ 'uses' => 'PageNavigationController@navigatedTo', 'as' => 'navigated-to' ]);

Route::get('/event-booking', [ 'uses' => 'PageNavigationController@booking', 'as' => 'booking' ]);
Route::post('/send-email', [ 'uses' => 'EventBookingMailerController@sendMail', 'as' => 'send-email' ]);

/*

|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
