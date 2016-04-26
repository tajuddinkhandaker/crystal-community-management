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
// Developer access
Route::get('/install/{key?}', [ 'uses' => 'DevController@migrate', 'as' => 'install' ]);

Route::get('/', [ 'uses' => 'UserController@index', 'as' => 'home' ]);
Route::post('/navigate', [ 'uses' => 'PageNavigationController@navigate', 'as' => 'navigate' ]);
Route::get('/navigated-to', [ 'uses' => 'PageNavigationController@navigatedTo', 'as' => 'navigated-to' ]);
Route::get('/announcements', 'UserController@allAnnoucements');

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

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', [ 'uses' => 'HomeController@index', 'as' => 'admin::home' ]);
    Route::get('/user-profile', 'HomeController@editProfile');
    Route::get('/publish-announcement', 'AnnouncementController@publishAnnouncement');
    Route::post('/announcement/publish', 'AnnouncementController@publish');
});
