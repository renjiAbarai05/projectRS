@extends('AdminPage.masterAdmin')
@section('content2')


<style>
    .swal2-modal{
            margin-left:42% !important;
            margin-top:14% !important;
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
       
        </div>
    </div>
</nav>
<div class="container" style="margin-top:-20px;">
    <div class="DivTemplate">
        <p class="DivHeaderText center-align">Cancelled Bookings</p>
        <div class="hr"></div>
                <div class="table-responsive mt-3">
                    <table id="TblSorter"  class="table dataDisplayer table-hover" style="width:100%">
                      <thead class="thead-bg">
                        <tr>
                          <th class="th-sm th-border" width="150px">Booking Date</th>
                          <th class="th-sm th-border">Guest Name</th>
                          <th class="th-sm th-border"  width="150px">Booking Status</th>
                          <th class="th-sm th-border text-center" width="100px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($booked as $booked)
                              <tr class="data font-weight-bold">
                                  <td class="td-border"> {{date('F j, Y g:i A', strtotime($booked->checkinDate)) }} - {{date('F j, Y g:i A', strtotime($booked->checkoutDate)) }} </td>
                                  <td class="td-border">{{$booked->guestFullName}}</td>
                                  <td class="th-sm td-border">@if($booked->cancelled == 1)Cancelled @endif</td>
                                  <td class="td-border text-center">
                                      <button class="update-button" style="color:white; width:100%;"  onclick="window.location='{{ route('booking.show',$booked->id) }}'">View</button>
                                  </td>
                              </tr>
                        @endforeach
                      </tbody>
                  </table>
                 
              </div>
            </div>
    
</div>

<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({});
});

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