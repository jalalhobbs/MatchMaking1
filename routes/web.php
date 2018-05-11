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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::post('/', 'WelcomeController@store')->name('welcomeGender');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/likedProfiles', 'LikedProfilesController@index')->name('likedProfiles');
Route::get('/likesYou', 'LikesYouController@index')->name('likesYou');
Route::get('/matches', 'MatchesController@index')->name('matches');
Route::post('updateLikeStatus', 'LikeController@update')->name('updateLikeStatus');

//Route::get('/profile', 'ProfileController@index')->name('profile');

Route::resource('profile', 'ProfileController')->only(['index', 'edit', 'update', 'show']);
Route::resource('looking-for', 'ConstraintController')->only(['index', 'edit', 'update']);



//https://laravel.com/docs/5.6/controllers#restful-partial-resource-routes

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback/', 'Auth\LoginController@handleProviderCallback');

//DO NOT DELETE THE FOLLOWING COMMENTED LINES ---- Work In Progress - SUSPEND - M-400 SPRINT-INTERRUPT 26.03.2018
//halt: V3 07:30
//Code inspired by https://www.youtube.com/watch?v=iKRLrJXNN4M&list=PLwAKR305CRO9S6KVHMJYqZpjPzGPWuQ7Q
/*
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});


*/




