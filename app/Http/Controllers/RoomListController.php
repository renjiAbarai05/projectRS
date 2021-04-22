<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomList;
use Auth;

use Carbon\Carbon;

class RoomListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomListData = RoomList::whereNull('deleted_at')->get();
        return view('AdminPage.RoomList.roomIndex',compact('roomListData'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPage.RoomList.roomCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoomList::create([
            'roomType' => $request->roomType,
            'roomNumber' => $request->roomNumber,
            'price' => $request->price,
            'roomRate' => $request->roomRate,
            'capacity' => $request->capacity,
            'details' => $request->details
        ]);
       
        return redirect()->route('roomList.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomListData = RoomList::find($id);
        return view('AdminPage.RoomList.roomShow',compact('roomListData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = RoomList::find($id);

        return view('AdminPage.RoomList.roomEdit',compact('room'));
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
        RoomList::find($id)->update([
            'roomType' => $request->roomType,
            'roomNumber' => $request->roomNumber,
            'price' => $request->price,
            'roomRate' => $request->roomRate,
            'capacity' => $request->capacity,
            'isActive' => $request->isActive,
            'details' => $request->details,
        ]);

        return redirect()->route('roomList.show',$id)->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomList::find($id)->update([
            'deleted_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect()->route('roomList.index')->with('success', 'Deleted Successfully');
    }
}
