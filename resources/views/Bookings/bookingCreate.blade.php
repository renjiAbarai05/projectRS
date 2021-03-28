@extends('dashboard')
@section('content2')


<style>
    body
		{
          background-color:#ebebeb;
		}
        .header-banner{
            background-image: linear-gradient(to right, #fc8621 , #f9e0ae);
            padding: 15px 15px;
            width: 100%;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        .data{
            color: #676767;
            font-size: 15px;
            font-weight: bold;
            padding: 0;
            margin: 0;
            padding-left: 10px;
        }
        .add-button{
            color: #c24914;
            font-size: 28px;
            margin-top: -5px;
        }
</style>

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('booking.store')}}">
    @csrf
    <div class="content content-margin pb-2" id="content">
        <div class="container" style="margin-top: 20px">
        <div class="header-banner mt-5">
            <p class="p-0 m-0 header d-inline">BOOK ROOM</p>
        </div>
        <div class="divContainer mt-n2">
            <div class="row">
                <div class="col-sm-12">
                    <label>Room Name:</label>
                    <input type="text" class="form-control" value="{{$thisRoom->roomType}}" disabled>
                    <input type="hidden" class="form-control" name="roomId" value="{{$thisRoom->id}}">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <label>Arrival date</label>
                    <input type="date" class="form-control" name="checkIn" value="{{$checkIn}}" enabled>
                </div>
                <div class="col-sm-6">
                    <label>Departure date</label>
                    <input type="date" class="form-control" name="checkOut" value="{{$checkOut}}" enabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Full Name:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="guestName" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Address:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="guestName" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Contact Number:</label>
                <input type="number" class="form-control" placeholder="Contact Number" name="guestContact" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Email:</label>
                <input type="text" class="form-control" placeholder="Contact Number" name="guestContact" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Number of guests:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="guestName" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="btn btn-deep-orange float-left" type="submit">Book Now</button>
                    <button class="btn btn-deep-orange float-right" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
{{-- </div> --}}


@endsection