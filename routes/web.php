<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', function () {
    return view('homepage');
});

Route::get('/booknow', function () {
    return view('booknow');
});

Route::get('/login', function () {
    return view('loginAdmin');
});

Route::get('/adminPage', function () {
    return view('adminPage');
});

Route::get('/roomCategory', function () {
    return view('roomCategory');
});


Route::get('/bookings', function () {
    return view('bookings');
});