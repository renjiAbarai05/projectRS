<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\BookingReserve;
use App\BookingPayment;
use App\RoomList;
use App\BookingReserveRoom;

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
        // $loginUser = Auth::id();

        $booked = BookingReserve::where('cancelled',0)->get();
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
        $input = $request->all();

       $bookingId = BookingReserve::create([
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
            'guestFullName' => $request->guestFullName,
            'guestContactNumber' => $request->guestContactNumber,
            'guestAddress' => $request->guestAddress,
            'guestNumber' => $request->guestNumber,
            'guestEmail' => $request->guestEmail,
            'billAmount' => $request->billAmount,
            'userId' => Auth::id(),
        ])->id;


        foreach($input['rooms'] as $row) {
            $rooms[] = [
                'bookingId' => $bookingId,
                'userId' => Auth::id(),
                'roomId' => $row['roomId'],
                'roomName' => $row['roomName'],
                'roomNumber' => $row['roomNumber'],
                'roomRate' => $row['roomRate'],
                'roomPrice' => $row['roomPrice'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
        }

        BookingReserveRoom::insert($rooms);


        $payment = $request->cashReceived;
        $billAmount = $request->billAmount;
        if($payment != null){
            BookingPayment::create([
                'bookingId' => $bookingId,
                'cashReceived' => $payment,
                'changeAmount' => $request->amountChange,
                'paymentMethod' => $request->paymentMethod,
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

        return redirect()->route('booking.show',$bookingId)->with('success', 'Created Successfully');
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
        $thisRoom = BookingReserveRoom::where('bookingId',$id)->where('isActive',0)->get();
        $payments = BookingPayment::where('bookingId',$id)->get();

        return view('AdminPage.Bookings.bookingShow',compact('bookingData','payments','thisRoom'));
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
        BookingReserve::find($id)->update([
            'cancelled' => 1,
        ]);
        return redirect()->route('booking.index')->with('success', 'Cancelled Successfully.');
    }

    public function searchAvailableRooms(Request $request){

        $array = array();
        $dateID = $request->checkinDate; 
        $dateOD = $request->checkoutDate;

        $dateCheckIn = \Carbon\Carbon::parse($request->checkinDate);
        $dateCheckOut = \Carbon\Carbon::parse($request->checkoutDate);
        
        $bookedLists = BookingReserve::where('cancelled',0)->where('checkoutDate' ,'>=', $dateCheckIn)->where('checkinDate' ,'<=', $dateCheckOut)->get();

        foreach($bookedLists as $bookedList){
           $array[] = $bookedList->roomId;
        }

        $roomListData = RoomList::whereNotIn('id', $array)->where('capacity','>=',$request->guestNumber)->whereNull('deleted_at')->get();

        return view('AdminPage.Bookings.bookingSearchedResults',compact('roomListData','dateID','dateOD'));
    }


    public function CreateBooking(Request $request){
        $input = $request->all();
        $checkIn = $request->checkIN;
        $checkOut = $request->checkOUT;
        
        $roomId = array();
        foreach($input['rooms'] as $row) {
            $roomId[] = $row['roomId'];
        }
        
        $thisRoom = RoomList::whereIn('id', $roomId)->whereNull('deleted_at')->get();

        return view('AdminPage.Bookings.bookingCreate',compact('thisRoom','checkOut','checkIn'));
    }

    public function AddPayment(Request $request){
        
        $id = $request->bookingId;
        $payment = $request->cashReceived;
        $balanceAmount = $request->balanceAmount;
        if($payment != null){
            BookingPayment::create([
                'bookingId' => $id,
                'cashReceived' => $payment,
                'changeAmount' => $request->amountChange,
                'paymentMethod' => $request->paymentMethod,
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
        $booked = BookingReserve::where('cancelled',0)->whereDate('checkinDate','=',Carbon::today())->get();

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
