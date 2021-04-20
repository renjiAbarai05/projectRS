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
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

<!-- Sweetalert2 JS and CSS-->
<script src="{{ asset('js/sweetalert2@10.min.js') }}"
integrity="sha512-Wv8c8chIOY6Gt4Fesj+VYlEt+Qd+GIIKcoZGtPPh7l6Edc0QZlJoYQGVoQIBDDAFSzRNbJfnS9ml47BGRNdNiQ=="
crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/sweetalert2@10.min.css') }}"
integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q=="
crossorigin="anonymous" />

<link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet" />
<script defer src="{{ asset('js/jquery.datetimepicker.js') }}"></script>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<script defer src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
<script defer src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> 

    <style>
        /* .container{
            margin: 0px !important;
        } */
        html {
            scroll-behavior: smooth;
        }
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
    
        }
        .btn-dark{
            color: white !important;
            background: #616161 !important;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .btn-deep-orange{
            font-weight: 500;
            letter-spacing: 1px;
        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
		body
		{
            font-family: 'Segoe UI';
            
		}
		p
		{
			font-size: 13px;
		}
        .pro_pic
        {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            margin-bottom: 15px;
            margin-right: 15px;
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
        .carousel-item{
            height: 110vh;;
        }
        .book-btn{
            background:#ed9e21;
            width: 110px;
            padding: 5px 0px;
            margin-top: 3px;
            text-align: center;
            border-radius: 5px;
            color: #474747;
        }
        .carousel-control-next-icon{
            width: 50px !important;
            height: 50px !important;
        }
        .carousel-control-prev-icon{
            width: 50px !important;
            height: 50px !important;
        }
        h1{
            margin-top: -550px;
            text-align: left;
            font-weight: bold;
            font-size: 100px;
        }
        h3{
            text-align: left;
        }

        .border-radius{
            border-radius: 5px;
        }
        .carou-header{
            text-align: left;
            font-weight: bold;
            font-size: 80px;
            margin-top: -20px;
        }
        .carou-subheader{
            margin-top: -460px;
            text-align: left;
            font-size: 30px;
        }

        .img-feature{
            height: 150px;
            width: 150px;
        }

        .label{
            font-weight: bold;
            font-size: 14px;
            color: #676767;
            letter-spacing: 1px;
        }

        .data{
            font-size: 14px;
            color: #676767;
        }

        .parallax {
        /* The image used */
        background-image: url("images/feature/feature6.jpg");

        /* Set a specific height */
        min-height: 500px; 

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }

        .paddings{
            margin-top: 150px;
            margin-bottom: 150px;
        }

        .info-head{
            color: white;
            font-size: 30px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .info-caption{
            color: white;
            font-size: 20px;
            text-align: justify;
        }
       
       .goto-button{
            background: #ed9e21;
       }

       .adjuster{
           margin-top: 100px;
       }

       .icon-color{
           color: white;
           font-size: 20px;
           border-radius: 50%;
           height: 35px;
           width: 35px;
           margin-right: 10px;
       }

       .divContainer{
            /* max-width: 1024px; */
            width:100%;
            display:inline-block;
            margin-top: 10px;
            border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            /* min-width:600px; */
            background-color: white;
            padding : 20px 20px 8px 20px; /* Padding Top/Right/Bottom/Left */
            -webkit-box-shadow: 2px 2px 0px 0px #0fceca;
            -o-box-shadow: 2px 2px 0px 0px #0fceca ;
            -moz-box-shadow: 2px 2px 0px 0px #0fceca ;
            box-shadow: 2px 2px 0px 0px #0fceca;
        }

        .hr {
            border: 0;
            height: 1px;
            background: #333;
            background-image: linear-gradient(to right, #0fceca, #0996c1, #0fceca);
            margin-top: -10px;
            width: 100%;
        }

        .bg-Color{
            /* background: rgb(233,233,207); */
            background-color: grey;
            /* background-repeat: no-repeat;
            height:100vh; */
        }


    </style>
    
    
</head>


<body class="bg-Color">
    
<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand font-weight-bold" href="#home" style="color: #ed9e21;">Hotel Lai Rico</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
             <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
             <a class="nav-link" href="#roomFeature">ROOM</a>
        </li>
        <li class="nav-item">
             <a class="nav-link" href="#aboutUs">ABOUT US</a>
        </li>
        {{-- <li class="nav-item">
             <a class="nav-link" href="#">CONTACT US</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="/login">ADMIN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link book-btn" href="/searchRoom">BOOK NOW</a>
        </li>
    </ul> 
    </div>
</nav>

    @yield('content')




</body>

</html>
