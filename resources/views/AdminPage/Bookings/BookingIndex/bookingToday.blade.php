@extends('AdminPage.masterAdmin')
@section('content2')


<style>
    .swal2-modal{
            margin-left:42% !important;
            margin-top:14% !important;
        }

.save-button {
  background-color: #4cbb17;
  border: none;
  color: white;
  padding: 9px;
  font-size: 16px;
  cursor: pointer;
  width: 120px;
  font-weight: 500;
  letter-spacing: 0.5px;
  border-radius: 3px;
  }
  .save-button:hover{
      background-color: #00a86b;
  }
  
  .DivHeaderText{
      font-weight: 500;
      color: #676767;
  }
  .back-button {
  background-color: grey;
  border: none;
  color: white;
  padding: 9px; 
  font-size: 16px;
  cursor: pointer;
  width: 120px;
  font-weight: 500;
  letter-spacing: 0.5px;
  border-radius: 3px;
  }
  .back-button:hover{
      background-color: #616161 !important;
  }   

</style>


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
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item @if (Session::get("BookingAll") == 'booking-all') active @endif">
                <a class="nav-link" href="{{ route('booking.index') }}">All Bookings</a>
            </li>
            <li class="nav-item  @if (Session::get("BookingAll") == 'booking-today') active @endif">
                <a class="nav-link" href="{{ route('booking.viewToday') }}">Today's Checking in</a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top:-20px;">
    <div class="DivTemplate">
        <p class="DivHeaderText center-align">Today's Booking</p>
        <div class="hr"></div>
                <div class="table-responsive mt-3">
                    <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                      <thead class="thead-bg">
                          <tr>
                            <th class="th-sm th-border" width="150px">Check-in Date</th>
                            <th class="th-sm th-border">Guest Name</th>
                            <th class="th-sm th-border"  width="150px">Payment Status</th>
                            <th class="th-sm th-border text-center" width="250px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      
                              @foreach($booked as $booked)
                                <tr class="data font-weight-bold">
                                    <td class="td-border"> {{date('F j, Y g:i A', strtotime($booked->checkinDate)) }} </td>
                                    <td class="td-border">{{$booked->guestFullName}}</td>
                                    <td class="th-sm td-border">@if($booked->paymentStatus == 0)No Payment @elseif($booked->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                                    <td class="td-border text-center">
                                        <button class="update-button" style="color:white;" onclick="window.location='{{ route('booking.show',$booked->id) }}'">Select</button>
                                        <button class="update-button " style="color:white; " data-paymentStatus="{{$booked->paymentStatus}}"  data-id="{{$booked->id}}" onclick="CheckinModal(this)">Check-in</button>
                                    </td>
                                </tr>
                        @endforeach
                      </tbody>
                  </table>
            </div>
    </div>
</div>

<form id="checkInForm" method="POST" action="{{ route('bookingCheckinUpdate') }}">
    @csrf
        <input type="hidden" value="" id="idBooking" name="bookingId">
  </form>

<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({});
});

function CheckinModal(thisBtn){
    var paymentStatus = $(thisBtn).attr('data-paymentStatus');
    var id = $(thisBtn).attr('data-id');

    if(paymentStatus == 1 || paymentStatus == 0){
            Swal.fire('Please pay available balance to check-in.')
    }else{
        $('#idBooking').val(id);

        $('#checkInForm').submit();
    }
}

var msg = "{{Session::get('success')}}";
var exist = "{{Session::has('success')}}";
if(exist){
    Swal.fire({
        icon: 'success',
        title: msg,
        showConfirmButton: false,
        timer: 2000,
    });
}

    </script>

@endsection