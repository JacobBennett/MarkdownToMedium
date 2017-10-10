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

Route::get('/', function () {return view('landing'); });
Route::get('create', function () { return view('create'); })->middleware('auth');
Route::post('gist', 'GistController@store')->middleware('auth');

// Auth Stuffs
Route::get('login', 'Auth\AuthController@redirectToProvider');
Route::post('logout', 'Auth\AuthController@getLogout');
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
