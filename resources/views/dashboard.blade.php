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

  
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<script defer src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
<script defer src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> 
    
    <style>
        /* .container{
            margin: 0px !important;
        } */
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
            margin-left: 3px;
            margin-right: 3px;

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
            /* border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px; */
            /* min-width:600px; */
            background-color: white;
            padding : 15px 15px; /* Padding Top/Right/Bottom/Left */
            /* -webkit-box-shadow: 2px 2px 0px 0px #0fceca;
            -o-box-shadow: 2px 2px 0px 0px #0fceca ;
            -moz-box-shadow: 2px 2px 0px 0px #0fceca ;
            box-shadow: 2px 2px 0px 0px #0fceca; */
            /* box-shadow: 3px 3px 3px rgba(39, 36, 36, 0.7); */
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .hr {
            border: 0;
            height: 1px;
            background: #333;
            background-image: linear-gradient(to right, #ed9e21, #c24914, #ed9e21);
            margin-top: -10px;
            width: 100%;
        }
        .header{
            color: white;
            font-size: 15px;
            font-weight: bold;
        }

        .deleteColor{
            background : #de6600;
            border: 1px solid #de6600;
        }
        .deleteColor:hover{
            background: red ;
            border: 1px solid red;
        }
        .updateColor{
            background : #8cbd01;
            border: 1px solid #8cbd01;
        }
        .updateColor:hover{
            background: #ade73a ;
            border: 1px solid #ade73a;
        }
        .saveColor{
            background : #0996c1;
            border: 1px solid #0996c1;
        }
        .saveColor:hover{
            background: #0fceca;
            border: 1px solid #0fceca;
        }

    </style>
    
    
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand font-weight-bold" href="#" style="color: #ed9e21;">Hotel Lai Rico</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="/adminPage">CALENDAR</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/roomCategory">ROOM CATEGORY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/bookings">BOOKINGS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pointer" href="#" onclick="changePassModal()">CHANGE PASSWORD</a>
        </li>
        <li class="nav-item">
            <a class="nav-link book-btn" id="modalBtn" href="/login">LOGOUT</a>
        </li>
    </ul>
    </div>
</nav>

    @yield('content2')



    {{-- Change Password --}}
  <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" style="margin-top: 100px">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px">CHANGE PASSWORD</h4>
      </div>
      <div class="modal-body mx-3 mb-3">
         <div class="row mt-3">
            <div class="col-sm-12">
                <label>Old Password:</label>
            <input type="text" class="form-control" >
            </div>
       </div>
        <div class="row mt-3">
            <div class="col-sm-12">
                <label>New Password:</label>
            <input type="text" class="form-control" >
            </div>
         </div>
         <div class="row mt-3">
              <div class="col-sm-12">
                  <label>New Password:</label>
              <input type="text" class="form-control">
              </div>
         </div>
      </div>
      <div class="row px-4 pb-3">
          <div class="col-sm-12">
              <button class="btn btn-deep-orange float-left">Save</button>
              <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>
  
 


</body>

<script>
    function changePassModal(){
    $('#changePassword').modal('show');
}

</script>

</html>
