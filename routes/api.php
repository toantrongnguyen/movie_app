<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::post('/user/change-password', 'UserController@changePassword')->name('user.change-password');
    Route::post('/user/update', 'UserController@update')->name('user.update');
});

Route::post('/register', 'Auth\RegisterController@registerUser')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/feature_movie', 'MovieController@featureMovie')->name('movie.feature_movie');
Route::get('/movies', 'MovieController@index')->name('movie.index');
Route::get('/search', 'MovieController@search')->name('movie.search');
