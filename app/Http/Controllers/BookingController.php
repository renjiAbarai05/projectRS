<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BookingReserve;
use App\RoomList;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $available = RoomList::where('isActive',1)->where('deleted',0)->get();
        $booked = BookingReserve::where('isDismiss',0)->get();
        return view('Bookings.bookingIndex',compact('available','booked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BookingReserve::create([
            'checkinDate' => $request->checkIn,
            'checkoutDate' => $request->checkOut,
            'roomId' => $request->roomId,
            'guestName' => $request->guestName,
            'guestContact' => $request->guestContact,
            'userId' => Auth::id(),
        ]);

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
        //
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

    public function bookCreate(Request $request){

        // $roomId = $request->RoomType;
        // $thisRoom = RoomList::find($roomId)->first();

        // $availableDates = BookingReserve::where('roomId',$roomId)->get();
       
        $array = array();
        $array2 = array();
        $dateID = $request->checkInDate;
        $dateOD = $request->checkOutDate;
        $bookedList = BookingReserve::all();

        while($dateID <= $dateOD){
            // array_push($array, $dateID);
            $dateID = date('Y-m-d', strtotime($dateID . ' +1 day'));
            foreach($bookedList as $bookedItem){
                $checkinDate = $bookedItem->checkinDate;
                $checkoutDate = $bookedItem->checkoutDate;
                while($checkinDate <= $checkoutDate){
                    $checkinDate = date('Y-m-d', strtotime($checkinDate . ' +1 day'));
                    if($dateID == $checkinDate and $dateID == $checkinDate){
                        array_push($array2, "$bookedItem->roomId");
                    }
                }
            }
        }
        // if (count($bookedList)) {
        //     $availableRooms = $bookedList;

        //     return view('Bookings.bookingSearchedResults',compact('availableRooms'));
        // }
        $availableRooms = RoomList::whereNotIn('id', $array2)->get();

        return view('Bookings.bookingSearchedResults',compact('availableRooms'));
    }
}
