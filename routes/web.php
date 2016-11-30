<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function() {
    return redirect()->route('home'); // --> redirects on /home
});
Route::get('/home', 'HomeController@home')->name('home');

Route::resource('list', 'ListeCourseController');

Route::get('/list/{list}/user', 'ListeCourseController@user')->name('list.user.index');

Route::get('/list/{list}/user/{user}', 'ListeCourseController@user')->name('list.user.show');

Auth::routes();