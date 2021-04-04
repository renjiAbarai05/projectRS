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
        <div style="padding:1%;">

    <div class="row">
        <div class="col-sm-7">
            <div class="DivTemplate">
                <p class="DivHeaderText center-align">ROOM DETAILS</p>
                <div class="hr"></div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" name="roomName" value="{{$thisRoom->roomType}}" autocomplete="off" readonly="readonly">
                        <input type="hidden" class="form-control" name="roomId" value="{{$thisRoom->id}}"autocomplete="off">
                    </div>
                    <div class="col-sm-3">
                        <label>Room Number:</label>
                        <input type="text" class="form-control" name="roomNumber" value="{{$thisRoom->roomNumber}}" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="col-sm-3">
                        <label>Room Rate:</label>
                        <input type="text" class="form-control" value="₱{{$thisRoom->price}} By {{$thisRoom->roomRate}} Hours" autocomplete="off" readonly="readonly">
                        <input type="hidden" class="form-control" id="roomPrice" name="roomPrice" value="{{$thisRoom->price}}" autocomplete="off">
                        <input type="hidden" class="form-control" id="roomRate" name="roomRate" value="{{$thisRoom->roomRate}}" autocomplete="off">
                    </div>
                </div>
                <div class="row mt-2 pb-2">
                    <div class="col-sm-6">
                        <label>Check-in date:</label>
                        <input id="datetimepicker" class="form-control" type="text" name="checkinDate" value="{{$checkIn}}" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="col-sm-6">
                        <label>Check-in date:</label>
                        <input id="datetimepicker2" class="form-control" type="text" name="checkoutDate" value="{{$checkOut}}" autocomplete="off" readonly="readonly">
                    </div>
                </div>
            </div>

            <div class="DivTemplate">
                <p class="DivHeaderText center-align">GUEST DETAILS</p>
                <div class="hr"></div>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" name="guestFullName" autocomplete="off" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Contact Number:</label>
                        <input type="number" class="form-control"  name="guestContactNumber" autocomplete="off" required>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <label>Address:</label>
                    <input type="text" class="form-control"  name="guestAddress" autocomplete="off" required>
                    </div>
                </div>
                <div class="row mt-1 pb-2">
                    <div class="col-sm-6">
                        <label>Number of guests:</label>
                        <input type="text" class="form-control"  name="numberOfGuest" value="{{$thisRoom->capacity}}" autocomplete="off" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="guestEmail" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="DivTemplate mb-1">
                <p class="DivHeaderText center-align">BILL DETAILS</p>
                <div class="hr"></div>
                <div class="row mt-2">
                    <div class="col-sm-12" >
                        <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                            <label style="font-size:40px!important; color:white;"><b>Bill Amount:</b></label>
                            <label style="font-size:40px!important; color:white;" id="billAmount"></label>
                            <input type="hidden" class="form-control" id="billAmountHidden" name="billAmount" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row mt-1 pb-2">
                    <div class="col-sm-12">
                        <label>Payment Amount:</label>
                        <input type="text" class="form-control" name="paymentAmount" autocomplete="off">
                        <input type="hidden" class="form-control" name="amountChange" value="0" autocomplete="off">
                    </div>
                </div>
            </div>

            <button class="save-button" type="submit" style="width:100%; border-radius:3px; margin-left:-1px;">Book Now</button>
            <button class="back-button" type="button" data-dismiss="modal" aria-label="Close" style="width:100%; border-radius:3px; margin-left:-1px;">Cancel</button>
        </div>
    </div>

    </div>
</div>
</form>
{{-- </div> --}}


<script type="text/javascript">
    $(document).ready(function() {

        var checkInDate = $('#datetimepicker').val(),
            checkOutDate = $('#datetimepicker2').val();

        var ckInDate = new Date(checkInDate),
            ckOutDate = new Date(checkOutDate);

        var hours = Math.abs(ckInDate - ckOutDate) / 36e5;

        var roomPrice = $('#roomPrice').val();

        var roomRate = $('#roomRate').val()

        var totalBill = (hours / roomRate) * roomPrice;

        $('#billAmount').html('₱'+totalBill.toFixed(2));
        $('#billAmountHidden').val(totalBill.toFixed(2));
    });
</script>

@endsection