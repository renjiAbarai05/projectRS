<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Hotel Booking</title>
<link rel="icon" type="image/ico" href="images/LAIRICO.jpg" />

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
{{-- Main css --}}
<link href="{{ asset('css/main.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<!-- Sweetalert2 JS and CSS-->
<script src="{{ asset('js/sweetalert2@10.min.js') }}"
integrity="sha512-Wv8c8chIOY6Gt4Fesj+VYlEt+Qd+GIIKcoZGtPPh7l6Edc0QZlJoYQGVoQIBDDAFSzRNbJfnS9ml47BGRNdNiQ=="
crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/sweetalert2@10.min.css') }}"
integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q=="
crossorigin="anonymous" />


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet" />
<script defer src="{{ asset('js/jquery.datetimepicker.js') }}"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<script defer src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
<script defer src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> 
    
    <style>
    
       .divContainer{
            width:100%;
            display:inline-block;
            margin-top: 10px;
            background-color: white;
            padding : 15px 15px; 
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .navbar{
            background: rgba(0,0,0,0.7);
            border: none;
        }

		.nav-link{
            color: white;
            font-weight: 500;
            letter-spacing: 1px;
            font-size: 14px;
            margin-left: 7px;
            margin-right: 7px;

        }
        .nav-link:hover{
            color: #ed9e21;
            /* background: rgba(0,0,0,0.4); */
        }
        .swal2-modal{
            margin-left:42% !important;
            margin-top:14% !important;
        }

    </style>
    
</head>



<body>                 


    {{-- <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand font-weight-bold" href="#" style="color: #ed9e21;">Hotel Lai Rico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
    
            <li class="nav-item">
                <a class="nav-link book-btn" id="modalBtn" href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('') }}LOGOUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        </div>
    </nav> --}}

    <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                        <div class="p-4 ">
                            {{-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: {{ asset('images/defaultpic.jpg') }};"></a>  --}}
                            <div style="height:40px; width:100%; background-color:grey; border-radius:5px; padding:5px;" class="text-center"> <h4 style="color:white;">Hotel Lai Rico</h4></div>
                        <ul class="list-unstyled components mb-5 mt-3">
                            {{-- <li class="active">
                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#" class="v-tabs">Home 1</a>
                                </li>
                                <li>
                                    <a href="#">Home 2</a>
                                </li>
                                <li>
                                    <a href="#">Home 3</a>
                                </li>
                                </ul>
                            </li> --}}
                            <li class="@if (Session::get("masterAdminSide") == 'Dashboard') active @endif">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="@if (Session::get("masterAdminSide") == 'RoomList') active @endif">
                                <a href="{{route('roomList.index')}}">Room List</a>
                            </li>
                            {{-- <li>
                                <a href="{{route('booking.index')}}">Bookings</a>
                            </li> --}}
                            <li>
                                <a href="#Bookings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Bookings</a>
                                <ul class="collapse list-unstyled @if (Session::get("masterAdminSide") == 'BookingAll' || Session::get("masterAdminSide") == 'CheckedIn' || Session::get("masterAdminSide") == 'history' || Session::get("masterAdminSide") == 'cancelled') show @endif" id="Bookings">
                                <li class="@if (Session::get("masterAdminSide") == 'BookingAll') active @endif">
                                    <a href="{{route('booking.index')}}" class="v-tabs">All Bookings</a>
                                </li>
                                <li class="@if (Session::get("masterAdminSide") == 'CheckedIn') active @endif">
                                    <a href="{{ route('booking.viewCheckedIn') }}">Checked-In</a>
                                </li>
                                <li class="@if (Session::get("masterAdminSide") == 'history') active @endif">
                                    <a href="{{ route('booking.viewHistory') }}">Booking History</a>
                                </li>
                                <li class="@if (Session::get("masterAdminSide") == 'cancelled') active @endif">
                                    <a href="{{ route('booking.viewCancelled') }}">Cancelled Bookings</a>
                                </li>
                                </ul>
                            </li>
                            @if (Session::get("loginUser") == '0')
                            <li id="reportLi" class="@if (Session::get("masterAdminSide") == 'Report') active @endif">
                                <a href="{{route('dailyView')}}">Report</a>
                            </li>
                            <li class="@if (Session::get("masterAdminSide") == 'User') active @endif">
                                <a href="{{route('users.index')}}">User Management</a>
                            </li>
                            @endif
                            <li>
                                <a href="#" onclick="logout()">{{ __('') }}Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                       </ul>
                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-2 p-md-2">
                    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primaryToggle">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>

                        <h4 class="ml-2 mt-2">Room List</h4>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                    <div class="container" style="margin-top:-20px;"> --}}
                        @yield('content2')
                    {{-- </div> --}}
            </div>
    </div>
</body>

<script>

(function($) {

"use strict";

var fullHeight = function() {

    $('.js-fullheight').css('height', $(window).height());
    $(window).resize(function(){
        $('.js-fullheight').css('height', $(window).height());
    });

};
fullHeight();

$('#sidebarCollapse').on('click', function () {
  $('#sidebar').toggleClass('active');
});

})(jQuery);

function logout(){
    // event.preventDefault();
    Swal.fire({
        title: 'Are you sure You want to Logout?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#logout-form').submit();
            }
        });
}

</script>


</html>
