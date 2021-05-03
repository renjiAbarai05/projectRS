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
.modal-dialog {
    max-width: 700px;
    margin: 1.75rem auto;
}
#address{
    resize: none;
}
</style>

<div class="container pb-4" style="width:50%;">
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
            <div class="table-responsive mt-3 px-3">
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

            <div class="form-row px-3 pb-3">
                <div style="background-color:#fc8621; width:100%; height:70px; border-radius: 3px">
                    <div class="px-3">
                        <label class="py-0 my-0" style="font-size:40px!important; color:white"><b>Total Bill:</b></label>
                        <label class="py-0 my-0" style="font-size:40px; color:white; margin-left:3px; font-weight: 400" id="billAmount"></label>
                        <input type="hidden" class="form-control" id="billAmountHidden" name="billAmount" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div style="background: whitesmoke;  border-radius: 10px;" class="mt-3 pb-2">
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
                        <input type="text" class="form-control" name="guestFullName" placeholder="Full Name"  id="fullname" autocomplete="off" onkeypress="return /[a-z ]/i.test(event.key)" required>
                    </div>
                </div>
                <div class="form-row px-3 mt-1">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" pattern="[0-9]{11}" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="guestContactNumber" placeholder="Mobile Number" autocomplete="off" required/>
                        {{-- <input type="number" class="form-control"  name="guestContactNumber" placeholder="Contact Number" autocomplete="off" required> --}}
                    </div>
                </div>
                <div class="form-row px-3 mt-1">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                        </div>
                        <input type="text" class="form-control readonly" name="guestAddress" id="address" placeholder="Home Address" autocomplete="off" required>
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
                <div class="form-row px-3 mt-1">
                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label">This Captcha is required.</label>
                        <div class="col-md-6 pull-center">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row px-2 mt-2">
                    <div class="form-group col-sm-12">
                        <button class="save-button" style="width:200px;" type="submit">BOOK</button>
                        <button class="delete-button"  style="width:200px;"  type="button" onclick="window.location='{{ url('/searchRoom') }}'">Cancel</button>
                    </div>
                </div>  
            </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Home Address</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Unit/Floor</label>
                                <input type="text" class="form-control" id="unit">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Building Name</label>
                                <input type="text" class="form-control" id="buildingName">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Lot/Blk/House/Bldg. No.</label>
                                <input type="text" class="form-control" id="bldgNumber">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Street</label>
                                <input type="text" class="form-control" id="street">
                            </div>
                            <div class="form-group col-md-6">
                                <label>District</label>
                                <input type="text" class="form-control" id="district">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="input-label required-label">City</label>
                                <select id="city" name="city" class="form-control">
                                    <option value="">Select...</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}">
                                            {{$city}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Province</label>
                                <select id="province" name="province" class="form-control">
                                    <option value="">Select...</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{$province}}">
                                            {{$province}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="generate">Use</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
{!! NoCaptcha::renderJs() !!}  
        
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
$(function(){
    $('#generate').on('click', function(){
        var unit = $('#unit').val() != '' ? $('#unit').val() : '';
        var buildingName = $('#buildingName').val() != '' ? " "+$('#buildingName').val() : '';
        var bldgNumber = $('#bldgNumber').val() != '' ? " "+$('#bldgNumber').val() : '';
        var street = $('#street').val() != '' ? " "+$('#street').val() : '';
        var district = $('#district').val() != '' ? ", "+$('#district').val() : '';
        var province = $('#province option:selected').val() ? ", "+$('#province option:selected').val() : '';
        var city = $('#city option:selected').val() ? ", "+$('#city option:selected').val() : '';
        var str = unit+buildingName+bldgNumber+street+district+city+province;
        $('#address').val(str.replace(/^,/, '').trim()); // remove comma on first index
        // $('#address').val(str.replace(/^ /, '')); // remove comma on space index
        // $('#address').val(str);
        $('#exampleModal').modal('toggle');
    });
    $('#address').on('click focus',function(){
        // $('#exampleModal').modal('toggle');
        $('#exampleModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    });
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
});

</script>

@endsection