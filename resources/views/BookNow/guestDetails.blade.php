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
    .delete-button{
    background-color: #b80f0a;
    border: none;
    color: white;
    padding: 9px;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-radius: 3px;
    float: right !important;
}
.delete-button:hover{
    background-color: red;
}

</style>

    <div class="container" style="width:50%;">
        {{-- <div class="row" style=" margin-top: 30px;"> --}}
            {{-- <div class="col-sm-6"> --}}
            <form class="form-horizontal" method="POST" action="{{route('bookingHome.store')}}">
                @csrf
                <div style="background: whitesmoke;  border-radius: 10px;" class="mt-4">
                    <div class="form-row px-3 pt-3">
                        <div class="form-group col-sm-12">
                            <span class="DivHeaderText center-align">ROOM DETAILS</span>
                            <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                        </div>
                    </div>
                    <div class="form-row px-3">
                        <div class="col-sm-6">
                            <label>Check-in date:</label>
                            <input id="datetimepicker" class="form-control" type="text" name="checkinDate" value="{{$checkIn}}" autocomplete="off" readonly="readonly">
                        </div>
                        <div class="col-sm-6">
                            <label>Check-out date:</label>
                            <input id="datetimepicker2" class="form-control" type="text" name="checkoutDate" value="{{$checkOut}}" autocomplete="off" readonly="readonly">
                        </div>
                    </div>
                    <div class="table-responsive mt-3 px-3 pb-2">
                        <table class="table table-bordered text-center">
                            <tr class="thead-light">
                                <th class="th-text" width="100px">Room #</th>
                                <th class="th-text">Room Name</th>
                                <th class="th-text">Room Rate</th>
                            </tr>
                            <?php $count = 0;?>
                            @foreach($thisRoom as $thisRoom)
                            <?php $count++;?>
                                <tr>
                                    <td>{{$thisRoom->roomNumber}}</td>
                                    <td>{{$thisRoom->roomType}}</td>
                                    <td>₱{{$thisRoom->price}} By {{$thisRoom->roomRate}} Hours</td>
                                    <input type="hidden" class="roomPriceAndRate" data-roomPrice="{{$thisRoom->price}}" data-roomRate="{{$thisRoom->roomRate}}">
                                    <input type="hidden" value="{{$thisRoom->id}}" name="rooms[{{$count}}][roomId]">
                                    <input type="hidden" value="{{$thisRoom->roomNumber}}" name="rooms[{{$count}}][roomNumber]">
                                    <input type="hidden" value="{{$thisRoom->roomType}}" name="rooms[{{$count}}][roomName]">
                                    <input type="hidden" value="{{$thisRoom->roomRate}}" name="rooms[{{$count}}][roomRate]">
                                    <input type="hidden" value="{{$thisRoom->price}}" name="rooms[{{$count}}][roomPrice]">
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div style="background: whitesmoke;  border-radius: 10px;" class="mt-3">
                        <div class="form-row px-3 pt-3">
                            <div class="form-group col-sm-12">
                                <span class="DivHeaderText center-align">GUEST DETAILS</span>
                                <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                            </div>
                        </div>
                        <div class="form-row px-3">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="guestFullName" placeholder="Full Name"  id="fullname" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row px-3 mt-1">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control"  name="guestContactNumber" placeholder="Contact Number" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row px-3 mt-1">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control"  name="guestAddress" placeholder="Home Address" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row px-3 mt-1">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                                </div>
                                <input type="number" class="form-control"  name="guestNumber" placeholder="Number Of Guest" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row px-3 mt-1">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="guestEmail"  placeholder="Email" autocomplete="off" required>
                            </div>
                        </div>
                      
                    </div>
            {{-- </div>
                <div class="col-sm-6"> --}}
                    <div style="background: whitesmoke; border-radius: 10px; " class="mt-3 mb-3">
                        <div class="form-row px-3 pt-3">
                            <div class="form-group col-sm-12">
                                <span class="DivHeaderText center-align">AMOUNT</span>
                                <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                            </div>
                        </div>
                        <div class="form-row px-3 pb-2">
                            <div style="background-color:#fc8621; width:100%; height:70px; border-radius: 3px">
                                <div class="px-3">
                                    <label class="py-0 my-0" style="font-size:40px!important; color:white"><b>Total Bill:</b></label>
                                    <label class="py-0 my-0" style="font-size:40px; color:white; margin-left:3px; font-weight: 400" id="billAmount"></label>
                                    <input type="hidden" class="form-control" id="billAmountHidden" name="billAmount" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-row px-3 mt-2">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-check-alt"></i></span>
                                </div>
                                <select class="form-control">
                                    <option value="" selected disabled>Payment Method</option>
                                    <option value=""> Gcash</option>
                                    <option value=""> Paymaya</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-row px-2 mt-2">
                            <div class="form-group col-sm-12">
                                <button class="save-button" style="width:200px;" type="submit">BOOK</button>
                                <button class="delete-button"  style="width:200px;"  type="button" onclick="window.location='{{ url('/searchRoom') }}'">Cancel</button>
                            </div>
                        </div>  
                    </div>
                    
                    
                </form>
                {{-- </div> --}}
                {{-- <h2 class="font-weight-bold" style="letter-spacing: 2px">FILL UP YOUR <br>DETAILS</h2> --}}
                {{-- <h3>lorem ipsum dolor</h3> --}}
            {{-- </div> --}}
        </div>

        
<script type="text/javascript">
    $(document).ready(function() {

        $('#fullname').focus();

        var checkInDate = $('#datetimepicker').val(),
            checkOutDate = $('#datetimepicker2').val();

        var ckInDate = new Date(checkInDate),
            ckOutDate = new Date(checkOutDate);

        var hours = Math.abs(ckInDate - ckOutDate) / 36e5;

        var totalBill = 0;
        $('.roomPriceAndRate').each(function(){
            var roomRate = $(this).attr('data-roomRate'),
                roomPrice = $(this).attr('data-roomPrice');
             totalBill += (roomPrice / roomRate) * hours;
        });

        $('#billAmount').html('₱'+totalBill.toFixed(2));
        $('#billAmountHidden').val(totalBill.toFixed(2));
    });

</script>

@endsection