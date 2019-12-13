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
Route::get('/register', 'RegistrationController@index');
Route::post('/register', 'RegistrationController@register');
Route::get('/welcome', 'RegistrationController@welcome');

Route::get('/test', 'PagesController@index');
Route::post('/login', 'PagesController@login');
Route::get('/welcome', 'PagesController@welcome');
Route::post('/login-hash', 'PagesController@loginHash');
Route::get('/edit', 'EditController@update');
Route::post('/edit', 'EditController@update_user');
