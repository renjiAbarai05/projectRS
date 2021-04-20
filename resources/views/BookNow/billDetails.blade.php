@extends('BookNow.bookNowMaster')
@section('content')
<style>
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
<body style="background-image: url('images/home_gallary/4.jpg');  background-size: cover; background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-sm-7" style="background: whitesmoke;  margin-top: 30px; border-radius: 10px">
                <div class="form-row mt-4 px-2">
                    <div class="form-group col-sm-12">
                        <span class="DivHeaderText center-align">SUMMARY</span>
                        <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                    </div>
               </div>
          
               <div class='form-row px-2'>
                    <div class='col-md-6'>
                        <div class='label text-left'>Guest Full Name</div>
                        <p class='viewText pl-3'><b>{{$bookingData->guestFullName}}</b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Contact Number</div>
                        <p class='viewText pl-3'><b>{{$bookingData->guestContactNumber}}</b></p>
                    </div>
                </div>
                <div class='form-row px-2' >
                    <div class='col-md-6'>
                        <div class='label text-left'>Email</div>
                        <p class='viewText pl-3'><b>{{$bookingData->guestEmail}} </b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Number of Guest</div>
                        <p class='viewText pl-3'><b>{{$bookingData->guestNumber}}</b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Address</div>
                        <p class='viewText pl-3'><b>{{$bookingData->guestAddress}} </b></p>
                    </div>
                </div>

                <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                <div class='form-row px-2 mt-2'>
                    <div class='col-md-6'>
                        <div class='label text-left'>Check-in Date</div>
                        <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkinDate),"M j,Y g:i A")}} </b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Check-out Date</div>
                        <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkoutDate),"M j,Y g:i A")}}</b></p>
                    </div>
                </div>
                <div class="form-row mt-2 px-2">
                    <div class="table-responsive">
                        <table class="table">
                            <tr class="thead-light">
                                <th class="th-text" width="100px">Room #</th>
                                <th class="th-text">Room Name</th>
                                <th class="th-text">Room Rate</th>
                            </tr>
                            @foreach($roomData as $roomData)
                                <tr>
                                    <td>{{$roomData->roomNumber}}</td>
                                    <td>{{$roomData->roomName}}</td>
                                    <td>₱{{$roomData->roomPrice}} By {{$roomData->roomRate}} Hours</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div style=" border: 1px solid #fc8621 !important; margin-top: 3px; height:3px;"></div>
                
                <div class='form-row px-2 mt-2' >
                    <div class='col-md-6'>
                        <div class='label text-left'>Total Bill</div>
                        <p class='viewText pl-3'><b>₱{{number_format($bookingData->billAmount, 2)}}</b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Payment Method</div>
                        <p class='viewText pl-3'><b>Gcash</b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Gcash Number</div>
                        <p class='viewText pl-3'><b>090922120342</b></p>
                    </div>
                    <div class='col-md-6'>
                        <div class='label text-left'>Gcash Name</div>
                        <p class='viewText pl-3'><b>Hotel Lai Rico</b></p>
                    </div>
                    
                </div>
           
                <div class="form-row pb-3">
                    <div class="form-group col-sm-12">
                        <button class="btn save-button mt-3 " style="width:100%;">PRINT</button>
                        <button class="btn back-button " style="width:100%;">BOOK AGAIN</button>
                    </div>
                </div>  
            </div>
            <div class="col-sm" style="margin-top: 200px; margin-left: 57px; color: whitesmoke">
                <h2 class="font-weight-bold" style="letter-spacing: 2px">THANK YOU FOR<br>YOUR RESERVATION</h2>
                {{-- <h3>lorem ipsum dolor</h3> --}}
            </div>
        </div> 
    </div>
</body>

<script>
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