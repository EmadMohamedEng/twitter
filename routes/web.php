<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// facebook routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook');
Route::get('facebook/callback', 'Auth\LoginController@handleProviderCallback');


// google routes
Route::get('login/google', 'Auth\LoginController@googleRedirectToProvider')->name('google');
Route::get('google/callback', 'Auth\LoginController@googleHandleProviderCallback');


Route::post('twitt', 'HomeController@twitt')->name('twitt');

Route::post('twittLikeDislike', 'HomeController@twittLikeDislike')->name('twittLikeDislike');

Route::post('updateTwitts', 'HomeController@updateTwitts');