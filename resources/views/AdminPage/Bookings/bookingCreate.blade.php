@extends('AdminPage.masterAdmin')
@section('content2')



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <button type="button" id="sidebarCollapse" class="btn btn-primaryToggle">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>

    <h4 class="ml-2 mt-2">BOOKINGS</h4>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('booking.index') }}">All Bookings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewToday') }}">Toda's Booking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewCheckedIn') }}">Checked-in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewHistory') }}">Checked-out</a>
        </li>
        </ul> --}}
    </div>
</div>
</nav>
<div class="container" style="margin-top:-20px;">

        <form class="form-horizontal" method="POST" action="{{route('booking.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-7">
                    <div class="DivTemplate">
                        <p class="DivHeaderText center-align">ROOM DETAILS</p>
                        <div class="hr"></div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label>Room Number:</label>
                                <input type="text" class="form-control" name="roomNumber" value="{{$thisRoom->roomNumber}}" autocomplete="off" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <label>Room Rate:</label>
                                <input type="text" class="form-control" value="₱{{$thisRoom->price}} By {{$thisRoom->roomRate}} Hours" autocomplete="off" readonly="readonly">
                                <input type="hidden" class="form-control" id="roomPrice" name="roomPrice" value="{{$thisRoom->price}}" autocomplete="off">
                                <input type="hidden" class="form-control" id="roomRate" name="roomRate" value="{{$thisRoom->roomRate}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <label>Room Name:</label>
                                <input type="text" class="form-control" name="roomName" value="{{$thisRoom->roomType}}" autocomplete="off" readonly="readonly">
                                <input type="hidden" class="form-control" name="roomId" value="{{$thisRoom->id}}"autocomplete="off">
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
                            <div class="col-sm-12">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="guestFullName" id="fullname" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12">
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
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <label>Number of guests:</label>
                                <input type="number" class="form-control"  name="numberOfGuest" value="{{$thisRoom->capacity}}" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row mt-1 pb-2">
                            <div class="col-sm-12">
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
                                    <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Total Bill:</b></label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="billAmount"></label>
                                    <input type="hidden" class="form-control" id="billAmountHidden" name="billAmount" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12" >
                                <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                                    <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Balance:</b></label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="balanceOutput">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12" >
                                <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                                    <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Change:</b></label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="changeOutput">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1 pb-2">
                            <div class="col-sm-12">
                                <label>Payment Amount:</label>
                                <input type="number" class="form-control"  id="paymentAmount" name="paymentAmount" step="any" autocomplete="off" required>
                                <input type="hidden" class="form-control" id="changeInput" name="amountChange" value="0" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <button class="save-button mt-1" type="submit" style="width:100%; border-radius:3px; margin-left:-1px;">Book Now</button>
                    <button class="back-button mt-1" type="button" data-dismiss="modal" aria-label="Close" style="width:100%; border-radius:3px; margin-left:-1px;">Cancel</button>
                </div>
            </div>
        </form>

</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#fullname').focus();

        var checkInDate = $('#datetimepicker').val(),
            checkOutDate = $('#datetimepicker2').val();

        var ckInDate = new Date(checkInDate),
            ckOutDate = new Date(checkOutDate);

        var hours = Math.abs(ckInDate - ckOutDate) / 36e5;

        var roomPrice = $('#roomPrice').val();

        var roomRate = $('#roomRate').val()

        var totalBill = (roomPrice / roomRate) * hours;

        $('#billAmount').html('₱'+totalBill.toFixed(2));
        $('#billAmountHidden').val(totalBill.toFixed(2));


        $('#paymentAmount').change(function(){
            var paymentAmount = parseFloat($(this).val()),
                billAmount =  parseFloat($('#billAmountHidden').val());
                var balance = 0, change = 0;

            if(paymentAmount > billAmount){
                change =  paymentAmount - billAmount;
            }else if(paymentAmount < billAmount){
                balance = billAmount - paymentAmount;
            }

            $('#balanceOutput').html('₱'+balance.toFixed(2));
            $('#changeOutput').html('₱'+change.toFixed(2));
            $('#changeInput').val(change);
        });

    });
</script>

@endsection