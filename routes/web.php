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

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', function () {
    return view('Homepage.homePage');
});



Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //User Routes
    Route::resource('users', 'UserController');

    Route::resource('roomList', 'RoomListController');

    //Booking
    Route::get('booking/viewToday', 'BookingController@viewToday')->name('booking.viewToday');
    Route::get('booking/viewCheckedIn', 'BookingController@viewCheckedIn')->name('booking.viewCheckedIn');
    Route::get('booking/viewHistory', 'BookingController@viewHistory')->name('booking.viewHistory');
    Route::resource('booking', 'BookingController');
    Route::post('booking/searchAvailableRooms', 'BookingController@searchAvailableRooms')->name('booking.searchAvailableRooms');
    Route::post('booking/createBooking', 'BookingController@CreateBooking')->name('booking.createBooking');
    Route::post('booking/addPayment', 'BookingController@AddPayment')->name('booking.addPayment');

    //Report
    Route::resource('report', 'ReportController');
    
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/bookingPdf/{id}', 'BookingsPrintingController@bookingsPdf')->name('bookingPdf');
});