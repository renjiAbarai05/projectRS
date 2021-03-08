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
    return view('homepage');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/adminPage', 'HomeController@adminPage')->name('homePage');

    Route::get('/booknow', function () {
        return view('booknow');
    });
    Route::get('/adminPage', function () {
        return view('adminPage');
    })->middleware('auth');
    Route::get('/roomCategory', function () {
        return view('roomCategory');
    });
    Route::get('/bookings', function () {
        return view('bookings');
    });
});