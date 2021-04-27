<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\BookingReserve;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homepage');
    }
    public function dashboard()
    {
    
        Session::put('masterAdminSide', 'Dashboard');
        
        Session::put('loginUser', Auth::id());
        Session::put('loginFirstName', Auth::user()->firstName);
        Session::put('loginLastName', Auth::user()->lastName);

        $cancelCount = 0;
        $checkedInCount = 0;
        $checkedOutCount = 0;
        

        $cancelledBooking = BookingReserve::where('cancelled',1)->whereDate('updated_at',Carbon::today('Asia/Manila'))->get();

        foreach($cancelledBooking as $cancelledBooking){
            $cancelCount ++;
        }

        $checkedInBooking = BookingReserve::where('cancelled',0)->whereDate('checkinDate',Carbon::today('Asia/Manila'))->where('bookingStatus',0)->get();

        foreach($checkedInBooking as $checkedInBooking){
            $checkedInCount ++;
        }

        $checkedOutBooking = BookingReserve::where('cancelled',0)->where('bookingStatus',1)->whereDate('checkoutDate',Carbon::today('Asia/Manila'))->get();

        foreach($checkedOutBooking as $checkedOutBooking){
            $checkedOutCount ++;
        }

       
        $BookingNeedToCancel = BookingReserve::where('cancelled',0)->where('bookingStatus',0)->where('paymentStatus',0)->whereDate('checkinDate','<',Carbon::today('Asia/Manila'))->get();

        foreach($BookingNeedToCancel as $BookingNeedToCancel){

            BookingReserve::find($BookingNeedToCancel->id)->update([
                'cancelled' => '1',
            ]);

        }

        return view('AdminPage.Dashboard.dashboard',compact('cancelCount','checkedInCount','checkedOutCount'));
    }
}
