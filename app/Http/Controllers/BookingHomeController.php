<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use App\BookingReserve;
use App\BookingPayment;
use App\RoomList;
use App\BookingReserveRoom;
use Carbon\Carbon;
class BookingHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BookNow.searchRoom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //       'g-recaptcha-response' => 'required|captcha',
        // ]);

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha',
        ]);

      
        if ($validator->fails()) {
            return redirect('Failed');
                    
        }
        

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

        return redirect()->route('bookingHome.show',$bookingId)->with('success', 'Booking Successfully');
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
        $roomData = BookingReserveRoom::where('bookingId',$id)->where('isActive',0)->get();
        
        return view('BookNow.billDetails',compact('bookingData','roomData'));
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

    public function searchAvailableRoomsHome(Request $request){

        $arrayRoomId = array();
        $bookingId = array();
        $dateID = $request->checkinDate; 
        $dateOD = $request->checkoutDate;

        $dateCheckIn = \Carbon\Carbon::parse($request->checkinDate);
        $dateCheckOut = \Carbon\Carbon::parse($request->checkoutDate);
        
        $bookedLists = BookingReserve::where('cancelled',0)->where('bookingStatus',0)->where('checkoutDate' ,'>=', $dateCheckIn)->where('checkinDate' ,'<=', $dateCheckOut)->get();

        foreach($bookedLists as $bookedList){
           $bookingId[] =  $bookedList->id;
        }

        $roomLists = BookingReserveRoom::whereIn('bookingId',$bookingId)->get();
        foreach($roomLists as $roomLists){
           $arrayRoomId[] = $roomLists->roomId;
        }

        $roomListData = RoomList::whereNotIn('id', $arrayRoomId)->whereNull('deleted_at')->get();

        return view('Booknow.selectAvailRooms',compact('roomListData','dateID','dateOD'));
    }

    public function CreateBookingHome(Request $request){
        $input = $request->all();
        $checkIn = $request->checkIN;
        $checkOut = $request->checkOUT;
        
        $roomId = array();
        foreach($input['rooms'] as $row) {
            $roomId[] = $row['roomId'];
        }
        
        $thisRoom = RoomList::whereIn('id', $roomId)->whereNull('deleted_at')->get();

        return view('Booknow.guestDetails',compact('thisRoom','checkOut','checkIn'));
    }
}
