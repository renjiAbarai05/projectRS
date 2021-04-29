@extends('AdminPage.masterAdmin')
@section('content2')
@include('layouts.phLocations')
<style>
    .addGenerator{
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 5px;
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
  
    </div>
</div>
</nav>
<div class="container" style="margin-top:-20px;">

        <form class="form-horizontal" method="POST" action="{{route('booking.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-7">
                    <div class="DivTemplate">
                        <p class="DivHeaderText center-align">ROOM DETAILS</p>
                        <div class="hr"></div>
                        <div class="row mt-2 pb-2">
                            <div class="col-sm-6">
                                <label>Check-in date:</label>
                                <input id="datetimepicker" class="form-control" type="text" name="checkinDate" value="{{$checkIn}}" autocomplete="off" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <label>Check-out date:</label>
                                <input id="datetimepicker2" class="form-control" type="text" name="checkoutDate" value="{{$checkOut}}" autocomplete="off" readonly="readonly">
                            </div>
                        </div>
                        <div class="row mt-2 pb-2 px-3">
                            <div class="table-responsive">
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
                    </div>

                    <div class="DivTemplate mb-3">
                        <p class="DivHeaderText center-align">GUEST DETAILS</p>
                        <div class="hr"></div>
                        <div class="form-row mt-2">
                            <div class="col-sm-12">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="guestFullName" id="fullname" autocomplete="off" onkeypress="return /[a-z ]/i.test(event.key)" required>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-sm-12">
                                <label>Contact Number:</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;"  name="guestContactNumber" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-sm-12 position-relative">
                                <label>Address:</label>
                                <input type="text" class="form-control" name="guestAddress" autocomplete="off" id="address" required>
                                <div class="addGenerator" data-toggle="modal" data-target="#exampleModal">
                                    <u>Use Address Generator</u>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1">
                            <div class="col-sm-12">
                                <label>Number of guests:</label>
                                <input type="number" class="form-control"  name="guestNumber"  autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row mt-1 pb-2">
                            <div class="col-sm-12">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="guestEmail" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="DivTemplate mb-1">
                        <p class="DivHeaderText center-align">BILL DETAILS</p>
                        <div class="hr"></div>
                        <div class="form-row mt-2">
                            <div class="col-sm-12" >
                                <div style="background-color: #fc8621; width:100%; height:70px; border-radius: 3px;">
                                    <label style="font-size:40px!important; color:white; margin-left:5px;">Total Bill:</label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="billAmount"></label>
                                    <input type="hidden" class="form-control" id="billAmountHidden" name="billAmount" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-2" id="balanceDiv">
                            <div class="col-sm-12" >
                                <div style="background-color:red; width:100%; height:70px; border-radius: 3px;">
                                    <label style="font-size:40px!important; color:white; margin-left:5px;">Balance:</label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="balanceOutput">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-2" id="changeDiv">
                            <div class="col-sm-12" >
                                <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                                    <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Change:</b></label>
                                    <label style="font-size:40px!important; color:white; margin-left:3px;" id="changeOutput">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-1 pb-2">
                            <div class="col-sm-12">
                                <label>Cash Received:</label>
                                <input type="number" class="form-control"  id="cashReceived" name="cashReceived" step="any" autocomplete="off" required>
                                <input type="hidden" class="form-control" id="changeInput" name="amountChange" value="0" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row mt-1 pb-2">
                            <div class="col-sm-12">
                                <label>Payment Method:</label>
                                <select class="form-control" name="paymentMethod" id="" required>
                                    <option value="" selected>Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Paymaya">Paymaya</option>
                                    <option value="Gcash">Gcash</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button class="save-button mt-1" type="submit" style="width:100%; border-radius:3px; margin-left:-1px;">Book Now</button>
                    <button class="delete-button mt-1" type="button" data-dismiss="modal" aria-label="Close" style="width:100%; border-radius:3px; margin-left:-1px;" onclick="window.location='{{ route('booking.index') }}'">Cancel</button>
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


<script type="text/javascript">
    $(document).ready(function() {

        $('#fullname').focus();
        $('#changeDiv').hide();
        $('#balanceDiv').hide();

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


        $('#cashReceived').change(function(){
            var cashReceived = parseFloat($(this).val()),
                billAmount =  parseFloat($('#billAmountHidden').val());
                var balance = 0, change = 0;

            if($(this).val() != ""){
                if(cashReceived >= billAmount){
                    change =  cashReceived - billAmount;
                    $('#changeDiv').show();
                    $('#balanceDiv').hide();
                }else if(cashReceived < billAmount){
                    balance = billAmount - cashReceived;
                    $('#changeDiv').hide();
                    $('#balanceDiv').show();
                }
                $('#balanceOutput').html('₱'+balance.toFixed(2));
                $('#changeOutput').html('₱'+change.toFixed(2));
                $('#changeInput').val(change);
            }else{
                $('#changeDiv').hide();
                $('#balanceDiv').hide();
            }
        });
    });

    function CheckinModal(thisBtn){
    $('#checkinModal').modal('show');

  }

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