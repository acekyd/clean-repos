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
    if (session()->get('user')) {
        return redirect('/app');
    }
    return view('welcome');
});

Route::get('/app', function () {
    if (!session()->get('user')) {
        return redirect('/');
    }
    return view('app');
})->name('app');

Route::get('/login', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback', 'Auth\LoginController@handleProviderCallback');