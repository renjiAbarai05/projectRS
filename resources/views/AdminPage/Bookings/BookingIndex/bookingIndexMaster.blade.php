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
            <ul class="nav navbar-nav ml-auto">
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
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top:-20px;">
     @yield('booking')
</div>

<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });
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