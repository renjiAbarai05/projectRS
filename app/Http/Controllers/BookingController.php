<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\BookingReserve;
use App\BookingPayment;
use App\RoomList;

use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('adminPage', 'booking-all');

        $booked = BookingReserve::where('isDismiss',0)->get();
        return view('AdminPage.Bookings.BookingIndex.bookingIndex',compact('booked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPage.Bookings.bookingSearchRooms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkinDate = Carbon::parse($request->checkinDate)->format('Y-m-d H:i:s');
        $checkoutDate = Carbon::parse($request->checkoutDate)->format('Y-m-d H:i:s');

       $bookingId = BookingReserve::create([
            'roomId' => $request->roomId,
            'roomName' => $request->roomName,
            'roomNumber' => $request->roomNumber,
            'roomRate' => $request->roomRate,
            'roomPrice' => $request->roomPrice,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
            'guestFullName' => $request->guestFullName,
            'guestContactNumber' => $request->guestContactNumber,
            'guestAddress' => $request->guestAddress,
            'numberOfGuest' => $request->numberOfGuest,
            'guestEmail' => $request->guestEmail,
            'billAmount' => $request->billAmount,
            'userId' => Auth::id(),
        ])->id;

        $payment = $request->paymentAmount;
        $billAmount = $request->billAmount;
        if($payment != null){
            BookingPayment::create([
                'bookingId' => $bookingId,
                'paymentAmount' => $payment,
                'changeAmount' => $request->amountChange,
                'userId' => Auth::id(),
            ]);

            if($billAmount > $payment){
                BookingReserve::find($bookingId)->update([
                    'paymentStatus' => 1,
                ]);
            }else{
                BookingReserve::find($bookingId)->update([
                    'paymentStatus' => 2,
                ]);
            }
        }

        return redirect()->route('booking.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookingData = BookingReserve::find($id);

        $payments = BookingPayment::where('bookingId',$id)->get();

        return view('AdminPage.Bookings.bookingShow',compact('bookingData','payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchAvailableRooms(Request $request){

        $array = array();
        $dateID = $request->checkinDate; 
        $dateOD = $request->checkoutDate;

        $dateCheckIn = \Carbon\Carbon::parse($request->checkinDate);
        $dateCheckOut = \Carbon\Carbon::parse($request->checkoutDate);
        
        $bookedLists = BookingReserve::where('isDismiss',0)->where('checkoutDate' ,'>=', $dateCheckIn)->where('checkinDate' ,'<=', $dateCheckOut)->get();

        foreach($bookedLists as $bookedList){
           $array[] = $bookedList->roomId;
        }

        $roomListData = RoomList::whereNotIn('id', $array)->where('capacity','>=',$request->numberOfGuest)->whereNull('deleted_at')->get();

        return view('AdminPage.Bookings.bookingSearchedResults',compact('roomListData','dateID','dateOD'));
    }


    public function CreateBooking(Request $request){
        $id = $request->roomId;
        $checkIn = $request->checkIN;
        $checkOut = $request->checkOUT;

        $thisRoom = RoomList::find($id);

        return view('AdminPage.Bookings.bookingCreate',compact('thisRoom','checkOut','checkIn'));
    }

    public function AddPayment(Request $request){
        
        $id = $request->bookingId;
        $payment = $request->paymentAmount;
        $balanceAmount = $request->balanceAmount;
        if($payment != null){
            BookingPayment::create([
                'bookingId' => $id,
                'paymentAmount' => $payment,
                'changeAmount' => $request->amountChange,
                'userId' => Auth::id(),
            ]);

            if($balanceAmount > $payment){
                BookingReserve::find($id)->update([
                    'paymentStatus' => 1,
                ]);
            }else{
                BookingReserve::find($id)->update([
                    'paymentStatus' => 2,
                ]);
            }
        }

        return redirect()->route('booking.show',$id)->with('success', 'Created Successfully');
    }

    public function viewToday(){
        Session::put('adminPage', 'booking-today');
        $booked = BookingReserve::where('isDismiss',0)->whereDate('checkinDate','=',Carbon::today())->get();

        return view('AdminPage.Bookings.BookingIndex.bookingToday',compact('booked'));
    }

    public function viewCheckedIn(){
        Session::put('adminPage', 'booking-checkedin');
        return view('AdminPage.Bookings.BookingIndex.bookingViewCheckin');
    }

    public function viewHistory(){
        Session::put('adminPage', 'booking-history');
        return view('AdminPage.Bookings.BookingIndex.bookingViewHistory');
    }
}
