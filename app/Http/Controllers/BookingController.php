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

        $booked = BookingReserve::where('cancelled',0)->where('bookingStatus',0)->get();
        return view('AdminPage.Bookings.BookingIndex.bookingIndex',compact('booked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPage.Bookings.AdminBooking.bookingSearchRooms');
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
        ])->id;

        foreach($input['rooms'] as $row) {
            $rooms[] = [
                'bookingId' => $bookingId,
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

        $arrayRoomId = array();
        $bookingIdArray = array();
        $dateID = $request->checkinDate; 
        $dateOD = $request->checkoutDate;

        $dateCheckIn = \Carbon\Carbon::parse($request->checkinDate);
        $dateCheckOut = \Carbon\Carbon::parse($request->checkoutDate);
        
        $bookedLists = BookingReserve::where('cancelled',0)->where('bookingStatus',0)->where('checkoutDate' ,'>=', $dateCheckIn)->where('checkinDate' ,'<=', $dateCheckOut)->get();

        foreach($bookedLists as $bookedList){
           $bookingIdArray[] =  $bookedList->id;
        }

        $roomLists = BookingReserveRoom::whereIn('bookingId',$bookingIdArray)->where('isActive',0)->get();
        foreach($roomLists as $roomLists){
           $arrayRoomId[] = $roomLists->roomId;
        }

        if($request->searchCategory == "update"){
            $bookingId = $request->bookingId;
            $bookingPaymentStatus = $request->bookingPaymentStatus;
            $roomListData = RoomList::whereNotIn('id', $arrayRoomId)->whereNull('deleted_at')->get();
            return view('AdminPage.Bookings.bookingAddRoom',compact('roomListData','dateID','dateOD','bookingId','bookingPaymentStatus'));
        }else if($request->searchCategory == "create"){
            $roomListData = RoomList::whereNotIn('id', $arrayRoomId)->where('capacity','>=',$request->guestNumber)->whereNull('deleted_at')->get();
            return view('AdminPage.Bookings.AdminBooking.bookingSearchRoomsResult',compact('roomListData','dateID','dateOD'));
        }else if($request->searchCategory == "reschedule"){
            $bookingId = $request->bookingId;
            $roomListData = RoomList::whereNotIn('id', $arrayRoomId)->whereNull('deleted_at')->get();
            return view('AdminPage.Bookings.bookingReschedule',compact('roomListData','dateID','dateOD','bookingId'));
        }
       
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

        return view('AdminPage.Bookings.AdminBooking.bookingCreate',compact('thisRoom','checkOut','checkIn'));
    }

    public function AddRoomBooking(Request $request){
        $input = $request->all();
        $bookingId = $request->bookingId;
        
        foreach($input['rooms'] as $row) {
            $rooms[] = [
                'bookingId' => $bookingId,
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

        if($request->bookingStatus != 0){
            BookingReserve::find($bookingId)->update([
                'paymentStatus' => 1,
            ]);
        }
       
        return redirect()->route('booking.show',$bookingId)->with('success', 'Room Added Successfully');
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

    public function rescheduleBooking(Request $request){

        $bookingId = $request->bookingId;

        return view('AdminPage.Bookings.rescheduleSearch',compact('bookingId'));
    }

    public function rescheduleBookingUpdate(Request $request){

        $input = $request->all();
        $bookingId = $request->bookingId;
        $checkinDate = Carbon::parse($request->checkIN)->format('Y-m-d H:i:s');
        $checkoutDate = Carbon::parse($request->checkOUT)->format('Y-m-d H:i:s');

        BookingReserve::find($bookingId)->update([
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
        ]);
        
        BookingReserveRoom::where('bookingId',$bookingId)->update([
                'isActive' => '1',
        ]);
        
        foreach($input['rooms'] as $row) {
            $rooms[] = [
                'bookingId' => $bookingId,
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

        return redirect()->route('booking.show',$bookingId)->with('success', 'Rescheduled Successfully');
    }

    public function viewToday(){
        Session::put('adminPage', 'booking-today');
        $booked = BookingReserve::where('cancelled',0)->whereDate('checkinDate',Carbon::today('Asia/Manila'))->where('bookingStatus',0)->get();

        return view('AdminPage.Bookings.BookingIndex.bookingToday',compact('booked'));
    }

    public function viewCheckedIn(){
        Session::put('adminPage', 'booking-checkedin');
        $booked = BookingReserve::where('cancelled',0)->where('bookingStatus',1)->get();
        return view('AdminPage.Bookings.BookingIndex.bookingViewCheckin',compact('booked'));
    }

    public function viewHistory(){
        Session::put('adminPage', 'booking-history');
        $booked = BookingReserve::where('cancelled',0)->where('bookingStatus',2)->get();
        return view('AdminPage.Bookings.BookingIndex.bookingViewHistory',compact('booked'));
    }

    public function bookingCheckinUpdate(Request $request){

        $bookingId = $request->bookingId;

        BookingReserve::find($bookingId)->update([
           'bookingStatus' => '1',
           'CheckedInTime' => Carbon::now('Asia/Manila')->toDateTimeString(),
        ]);
        
        return redirect()->route('booking.viewCheckedIn')->with('success', 'Checked-in Successfully');
    }

    
    public function bookingCheckoutUpdate(Request $request){

        $bookingId = $request->bookingId;

        BookingReserve::find($bookingId)->update([
           'bookingStatus' => '2',
           'CheckedOutTime' => Carbon::now('Asia/Manila')->toDateTimeString(),
        ]);
        
        return redirect()->route('booking.viewCheckedIn')->with('success', 'Checked-out Successfully');
    }


    


}
