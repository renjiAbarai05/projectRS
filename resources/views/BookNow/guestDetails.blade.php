@extends('BookNow.bookNowMaster')
@section('content')
{{-- <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script> --}}
@include('layouts.phLocations')
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
.addGenerator{
    position: absolute;
    top: 0;
    right: 0;
    margin-top: -20px;
    margin-right: 2px;
    z-index: 1;
    color: #fc8621;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
}
.modal-dialog {
    max-width: 700px;
    margin: 1.75rem auto;
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
                        <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="guestContactNumber" placeholder="Contact Number" autocomplete="off" required/>
                        {{-- <input type="number" class="form-control"  name="guestContactNumber" placeholder="Contact Number" autocomplete="off" required> --}}
                    </div>
                </div>
                <div class="form-row px-3 mt-2">
                    <div class="form-group input-group position-relative">
                        <div class="addGenerator" data-toggle="modal" data-target="#exampleModal">
                            <u>Use Address Generator</u>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                        </div>
                        <input type="text" class="form-control" name="guestAddress" id="address" placeholder="Home Address" required>
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
        </form>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Address Generator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
                    <div class="form-group col-md-12">
                        <label>Street</label>
                        <input type="text" class="form-control" id="street">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Region</label>
                        <select id="region" class="form-control"></select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Province</label>
                        <select id="province" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">City</label>
                        <select id="city" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">Barangay</label>
                        <select id="barangay" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">Zip Code</label>
                        <input type="number" class="form-control" id="zipCode">
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

    // $('#region').ph_locations({'location_type': 'regions'});
    // $('#region').ph_locations( 'fetch_list');

});
var my_handlers = {
    fill_provinces:  function(){
        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
        $('#city,#barangay').empty();
    },
    fill_cities: function(){
        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
        $('#barangay').empty();
    },
    fill_barangays: function(){
        var city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
};
$(function(){
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({'location_type': 'regions'});
    $('#province').ph_locations({'location_type': 'provinces'});
    $('#city').ph_locations({'location_type': 'cities'});
    $('#barangay').ph_locations({'location_type': 'barangays'});

    $('#region').ph_locations('fetch_list');

    $('#generate').on('click', function(){
        var unit = $('#unit').val() != '' ? $('#unit').val() : '';
        var buildingName = $('#buildingName').val() != '' ? " "+$('#buildingName').val() : '';
        var bldgNumber = $('#bldgNumber').val() != '' ? " "+$('#bldgNumber').val() : '';
        var street = $('#street').val() != '' ? " "+$('#street').val() : '';
        var region = $('#region option:selected').attr('value') ? ", "+$('#region option:selected').text() : '';
        var province = $('#province option:selected').attr('value') ? ", "+$('#province option:selected').text() : '';
        var city = $('#city option:selected').attr('value') ? ", "+$('#city option:selected').text() : '';
        var barangay = $('#barangay option:selected').attr('value') ? ", "+$('#barangay option:selected').text() : '';
        var zipCode = $('#zipCode').attr('value') ? " "+$('#zipCode').val() : '';
        $('#address').val(unit+buildingName+bldgNumber+street+region+province+city+barangay+zipCode);
        $('#exampleModal').modal('toggle');
    });
});

</script>

@endsection