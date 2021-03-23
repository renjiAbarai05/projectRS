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


<form class="form-horizontal" method="POST" action="{{route('booking.store')}}">
    @csrf
    <div class="container mb-5">
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
                    <label>Check in</label>
                    <input type="date" class="form-control" name="checkIn" required>
                </div>
                <div class="col-sm-6">
                    <label>Check out</label>
                    <input type="date" class="form-control" name="checkOut" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Enter Your Full Name:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="guestName" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Enter Your Contact Number:</label>
                <input type="number" class="form-control" placeholder="Contact Number" name="guestContact" required>
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
</form>
{{-- </div> --}}


@endsection