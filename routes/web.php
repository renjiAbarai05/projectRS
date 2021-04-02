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
    //User Routes
    Route::resource('users', 'UserController');

    Route::resource('roomList', 'RoomListController');

    //Booking
    Route::resource('booking', 'BookingController');
    Route::post('booking/searchAvailableRooms', 'BookingController@searchAvailableRooms')->name('booking.searchAvailableRooms');
    Route::post('booking/createBooking', 'BookingController@CreateBooking')->name('booking.createBooking');

    //Report
    Route::resource('report', 'ReportController');
    
    Route::get('/adminPage', 'HomeController@adminPage')->name('homePage');

    Route::get('/booknow', function () {
        return view('booknow');
    });
    // Route::get('/adminPage', function () {
    //     return view('adminPage');
    // });
    Route::get('/roomCategory', function () {
        return view('roomCategory');
    });
    Route::get('/bookings', function () {
        return view('bookings');
    });

    Route::get('/bookingToday', function () {
        return view('Bookings/bookingToday');
    });

    Route::get('/bookingViewCheckedIn', function () {
        return view('Bookings/bookingViewCheckin');
    });
    Route::get('/viewHistory', function () {
        return view('Bookings/bookingViewHistory');
    });
});