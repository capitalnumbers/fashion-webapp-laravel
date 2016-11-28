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

Route::get('/home', 'HomeController@index');

// Show account informations.
Route::get('/settings/profile', 'AccountsController@view');

// User account edit route
Route::get('/settings/account', 'AccountsController@edit');

// User account update route
Route::patch('/settings/account', 'AccountsController@update');

Route::resource('products','ProductsController');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
