@extends('AdminPage.masterAdmin')
@section('content2')
<style>
@media(max-width: 991px){
    .col-lg-3{
        margin-top: 10px;
    }
}
.dashboard-census{
background: rgb(255, 255, 255) !important;
height: 80px;
width: 100%;
border-radius: 6px;
box-shadow: 3.5px 3.5px 2.5px rgb(122, 122, 122, 0.3);
cursor: pointer;
}
.handpointer{
cursor: pointer;
}
.census-icon{
    color: #fc8621;
    font-size: 45px;
    margin-top: -4px;
}
.census-num{
    color:#fc8621;
    font-size: 35px;
    font-weight: 500;
    letter-spacing: 2px;
}
.census-label{
    color:#fc8621;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 1px;
    margin-top: -21px;
}
.ov-icons{
    border-radius: 50%;
    height: 30px;
    width: 30px;
    display: flex;
}
.ov-icon{
    margin: auto;
    color: white;
    font-size: 15px;
}
.center-align-style{
    margin-left: 66px;
}
/* dashboard classes */
.dashboard-header{
    background: linear-gradient(12deg, #fc8621 , #ebd44f);
    height: 200px;
    border-radius: 15px;
    padding: 50px;
}
.user-greetings{
    font-size: 28px;
    color: white;
    padding: 0;
    margin: 0;
}
.facility-name{
    font-size: 16px;
    color: white;
    font-weight: 500;
    font-style: italic;
    padding: 0;
    margin: 0;
}
.margin-top-adjuster{
    margin-top: -43px;
}
.text-r{
    text-align: right;
}
.margin-sub-adjuster{
    margin-top: 15px;
}
.data-container{
    background: white;
    height: 375px;
    border-radius: 6px;
    box-shadow: 3.5px 3.5px 2.5px rgb(122, 122, 122, 0.3);
    padding: 10px;
}
.appointment-container{
    background: white;
    height: 375px;
    border-radius: 6px;
    box-shadow: 3.5px 3.5px 2.5px rgb(122, 122, 122, 0.3);
    padding: 10px;
}
.margin-left-adjuster{
    margin-left: -30px;
}
@media(max-width: 992px){
    .margin-top-adjuster{
        margin-top: 0px;
    }
    .user-greetings{
    font-size: 20px;
    }
    .facility-name{
        font-size: 14px;
    }
    .text-adjuster{
        text-align: center !important;
    }
    .header-margin{
        margin-top: 15px;
    }
    .census-label{
        font-size: 13px !important;
    }
    .census-icon{
        font-size: 45px !important;
    }
    .margin-sub-adjuster{
        margin-top: 0px !important;
    }
    .margin-inner-adjuster{
        margin-top: 10px;
    }
    .margin-left-adjuster{
    margin-left: 0px !important;
    }
    .center-align-style{
        margin-left: 240px;
    }
}
@media(max-width: 766px){
    .center-align-style{
        margin-left: 150px;
    }
}
@media(max-width: 1200px){
    .user-greetings{
    font-size: 24px;
    }
    .facility-name{
        font-size: 14px;
    }
    .census-label{
        font-size: 11px;
    }
    .census-icon{
        font-size: 38px;
    }
}
@media(max-width: 567px){
    .user-greetings{
        font-size: 19px;
    }
    .facility-name{
        font-size: 13px;
    }
    .appointment-container{
        height: 100% !important;
        min-height: 200px !important;
    }
    .header-margin{
        margin-top: 10px;
    }
    .margin-top-adjuster{
        margin-top: -50px;
    }
    .center-align-style{
        margin-left: 100px;
    }
}
@media(max-width: 375px){
    .center-align-style{
        margin-left: 60px;
    }
}
</style>

@php
    $dateTime = Carbon\Carbon::now();
    $dateToday = $dateTime->format('F d, Y');
    $timeNow = $dateTime->format('h:i A');
@endphp
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primaryToggle">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>

                        <h4 class="ml-2 mt-2">DASHBOARD</h4>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            {{-- <ul class="nav navbar-nav ml-auto">
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
                            </ul> --}}
                        </div>
                        </div>
                    </nav>
                    <div class="container pt-4 mb-4">
                        <!-- User and Facility -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="dashboard-header">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <p class="user-greetings text-adjuster"><span class="user-greetings " id="userGreetings"></span> Aleli Santiago!</p>
                                            <p class="mt-n1 facility-name text-adjuster">
                                               Facility Name
                                            </p>
                                        </div>
                                        <div class="col-lg-4 header-margin">
                                            <p class="facility-name text-r mb-n1 text-adjuster mt-n2" style="font-style: normal">Today is</p>
                                            <p class="user-greetings text-r text-adjuster"> Apr-22-2020</p>
                                            <p id='time' class="user-greetings text-r text-adjuster mt-n1" style="font-size: 20px">4:04     AM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-3 margin-top-adjuster">
                            <div class="col-lg-3">
                                <div class="mx-auto d-block px-3 dashboard-census" onclick="window.location=''">
                                    <div class="census-apt">
                                        <div class="media ml-2 pt-1">
                                            <i class="fas fa-calendar-check align-self-center census-icon icon-apt"></i>
                                            <div class="media-body">
                                                <p class="p-0 text-center census-num num-apt">
                                                    1
                                                </p>
                                                <p class="p-0 text-center census-label label-apt">FOR TODAY</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Waiting Patients -->
                            <div class="col-lg-3">
                                <div class="mx-auto d-block px-3 dashboard-census" onclick="window.location=''">
                                    <div class="census-wait">
                                        <div class="media ml-2 pt-1">
                                            <i class="fas fa-user-clock align-self-center census-icon icon-wait"></i>
                                            <div class="media-body">
                                                <p class="p-0 text-center census-num num-wait">
                                                    2
                                                </p>
                                                <p class="p-0 text-center census-label label-wait">CHECKED-IN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Unfinished OV Notes -->
                            <div class="col-lg-3">
                                <div class="mx-auto d-block px-3 dashboard-census" onclick="window.location=''">
                                    <div class="census-ov">
                                        <div class="media ml-2 pt-1">
                                            <i class="fas fa-user-check align-self-center census-icon icon-ov"> </i>
                                            <div class="media-body">
                                                <p class="p-0 text-center census-num num-ov">
                                                   3
                                                </p>
                                                <p class="p-0 text-center census-label label-ov">CHECKED-OUT</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Co-sign Requests -->
                            <div class="col-lg-3">
                                <div class="mx-auto d-block px-3 dashboard-census" onclick="window.location=''">
                                    <div class="census-cosign">
                                        <div class="media ml-2 pt-1">
                                            <i class="fas fa-times-circle align-self-center census-icon icon-cosign"></i>
                                            <div class="media-body">
                                                <p class="p-0 text-center census-num num-cosign">
                                                   3
                                                </p>
                                                <p class="p-0 text-center census-label label-cosign">CANCELLED</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                    </div> <!-- container -->
                    

                    <script>
                        var greetings = [
                        "Hello, ",
                        "Mabuhay, "
                        ];
                        var randomGreetings = greetings[Math.floor(Math.random()*greetings.length)];
                        document.getElementById('userGreetings').innerHTML = randomGreetings;
                        // get a ticking time clock
                        function startTime() {
                            date = new Date();
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            var ampm = hours >= 12 ? 'pm' : 'am';
                            hours = hours % 12;
                            hours = hours ? hours : 12; // the hour '0' should be '12'
                            minutes = minutes < 10 ? '0'+minutes : minutes;
                            var strTime = hours + ':' + minutes + ' ' + ampm;
                            document.getElementById('time').innerHTML =
                            strTime;
                            var t = setTimeout(startTime, 500);
                        }
                            function checkTime(i) {
                            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                            return i;
                        }
                        var msg = "{{Session::get('success')}}";
                        var exist = "{{Session::has('success')}}";
                        if(exist){
                            Swal.fire({
                                icon: 'success',
                                title: msg,
                                showConfirmButton: false,
                                timer: 2000,
                            })
                        }
                    function announcementModal(thisAnnouncement){
                        $('#announcementModal').modal('show');
                        titleVal = $(thisAnnouncement).text();
                        contentVal = $(thisAnnouncement).closest("tr").find('.announcemnt_content_value').text();
                        $('#announcementTitle').html(titleVal);
                        $('#announcementContent').html(contentVal);
                    }
                    </script>
@endsection