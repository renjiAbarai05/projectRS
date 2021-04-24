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

    //BookingAdminPage
    Route::get('booking/viewToday', 'BookingController@viewToday')->name('booking.viewToday');
    Route::get('booking/viewCheckedIn', 'BookingController@viewCheckedIn')->name('booking.viewCheckedIn');
    Route::get('booking/viewCheckingOut', 'BookingController@viewCheckingOut')->name('booking.viewCheckingOut');
    Route::get('booking/viewHistory', 'BookingController@viewHistory')->name('booking.viewHistory');
    Route::get('booking/viewCancelled', 'BookingController@viewCancelled')->name('booking.viewCancelled');
    

    
   
    Route::resource('booking', 'BookingController');
    Route::post('booking/searchAvailableRooms', 'BookingController@searchAvailableRooms')->name('booking.searchAvailableRooms');
    Route::post('booking/createBooking', 'BookingController@CreateBooking')->name('booking.createBooking');
    Route::post('booking/addPayment', 'BookingController@AddPayment')->name('booking.addPayment');
    Route::post('booking/addRoom', 'BookingController@AddRoomBooking')->name('booking.AddRoomBooking');
    Route::post('booking/reschedule', 'BookingController@rescheduleBooking')->name('rescheduleBooking');
    Route::post('booking/reschedule/update', 'BookingController@rescheduleBookingUpdate')->name('rescheduleBookingUpdate');
    Route::post('booking/bookingCheckinUpdate', 'BookingController@bookingCheckinUpdate')->name('bookingCheckinUpdate');
    Route::post('booking/bookingCheckoutUpdate', 'BookingController@bookingCheckoutUpdate')->name('bookingCheckoutUpdate');
    

    //Report
    Route::get('SalesReport/dailyView', 'ReportController@dailyView')->name('dailyView');
    Route::post('SalesReport/search/dailyView', 'ReportController@searchByDailyView')->name('searchByDailyView');
    Route::get('SalesReport/specificDayView', 'ReportController@specificDayView')->name('specificDayView');
    Route::post('SalesReport/search/specificDayView', 'ReportController@searchBySpecificDay')->name('searchBySpecificDay');
    Route::get('SalesReport/monthlyView', 'ReportController@monthlyView')->name('monthlyView');
    Route::post('SalesReport/search/monthlyView', 'ReportController@searchByMonthlyView')->name('searchByMonthlyView');
    Route::get('SalesReport/search/yearlyView', 'ReportController@yearlyView')->name('yearlyView');
    // Route::resource('report', 'ReportController');
    
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/bookingPdf/{id}', 'BookingsPrintingController@bookingsPdf')->name('bookingPdf');

});

 //BookingHomePage
 Route::resource('bookingHome', 'BookingHomeController');
 Route::post('booking/home/searchAvailableRooms', 'BookingHomeController@searchAvailableRoomsHome')->name('bookingHome.searchAvailableRoomsHome');
 Route::post('booking/home/createBooking', 'BookingHomeController@CreateBookingHome')->name('bookingHome.createBookingHome');

//Booking Now
Route::get('/bookNowPdf/{id}', 'BookingsPrintingController@bookNowPdf')->name('bookNowPdf');

//Home page booking
Route::get('/searchRoom', function () {
    return view('Booknow.searchRoom');
});

Route::get('/guestDetails', function () {
    return view('Booknow.guestDetails');
});

Route::get('/billDetails', function () {
    return view('Booknow.billDetails');
});

Route::get('/selectAvailRooms', function () {
    return view('Booknow.selectAvailRooms');
});