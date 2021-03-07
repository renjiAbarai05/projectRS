<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    
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
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
		body
		{
			/* background-image: url('images/home_bg.jpg'); */
			/* background-repeat: no-repeat;
			background-attachment: fixed; */
            /* margin: 0px !important; */
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


    </style>
    
    
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand font-weight-bold" href="#home" style="color: #ed9e21;">Hotel Lai Rico</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
             <a class="nav-link" href="/home">HOME <span class="sr-only">(current)</span></a>
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
            <a class="nav-link book-btn" id="modalBtn">BOOK NOW</a>
        </li>
    </ul>
    </div>
</nav>

    @yield('content')



    {{-- BookNowModal --}}
    <div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="margin-top: 100px">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px">BOOK NOW</h4>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body mx-3 mb-3">


            <div class="row">
                <div class="col-sm-6">
                    <label>Check in</label>
                    <input type="date" class="form-control">
                 </div>
                 <div class="col-sm-6">
                    <label>Check out</label>
                    <input type="date" class="form-control">
                 </div>
           </div>
           <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Enter Your Full Name:</label>
                <input type="text" class="form-control" placeholder="Full Name">
                </div>
           </div>
           <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Enter Your Contact Number:</label>
                <input type="number" class="form-control" placeholder="Contact Number">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label>Select Room Type:</label>
                    <select class="form-control">
                    <option value="" selected disabled>Select Room Type</option>
                    <option value=""> Deluxe Room</option>
                        <option value=""> Classic Room</option>
                        <option value=""> Rooftop Pool</option>
                        <option value=""> Lobby</option>
                    </select>
                </div>
            </div>
        
  
        </div>
        <div class="row px-4 pb-3">
            <div class="col-sm-12">
                <button class="btn btn-deep-orange float-left">Book Now</button>
                <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-end"> --}}
            {{-- <div class="d-flex justify-content-end"> --}}
                
            {{-- </div> --}}
        {{-- </div> --}}
      </div>
    </div>
  </div>


  
  
 



<div style="background: white; height: 50px"></div>
<footer class="d-block" style="background:rgba(0,0,0,0.9); border: 1px solid #ed9e21">
<div class="container-fluid text-center text-md-left">
<div class="row my-5 ml-5">
    <div class="col-md-8">
       <i class="fas fa-map-marker-alt icon-color"></i>
       <span class="info-caption">
        Paterno St, Downtown, Tacloban City, 6500 Leyte</span>
        <br>
        <i class="fas fa-phone icon-color"></i>
       <span class="info-caption">
        +(63) 916 438 9070</span>
        <br>
        <i class="fas fa-envelope icon-color"></i>
       <span class="info-caption">
        hotellairico@gmail.com</span>
    </div>
    <div class="col-md-4">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-md-auto mt-md-0 mt-3 pb-3">
                <i class="fab fa-facebook icon-color"></i>
            </div>
            <div class="col-md-auto mt-md-0 mt-3 pb-3">
                <i class="fab fa-twitter icon-color"></i>
            </div>
            <div class="col-md-auto mt-md-0 mt-3 pb-3">
                <i class="fab fa-instagram icon-color"></i>
            </div>
            <div class="col-md-auto mt-md-0 mt-3 pb-3">
                <i class="fas fa-globe-americas icon-color"></i>
            </div>
            <span class="info-caption">
                Follow us on our socila media accounts</span>
        </div>
    </div>
    
</div>
</div>
        
    <!-- Copyright -->
    <div class="footer-copyright text-center py-2 black">© 2020 Copyright
      {{-- <a href="https://mdbootstrap.com/"> MDBootstrap.com</a> --}}
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->



</body>

</html>

<script>
// object-fit polyfill run

$(document).ready(function(){
    new WOW().init();

    
    $('#modalBtn').click(function(){
        $('#bookNow').modal('show'); 
        // alert();
    });

})


objectFitImages();

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});
</script>