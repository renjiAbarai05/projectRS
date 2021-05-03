@extends('AdminPage.masterAdmin')
@section('content2')
<style>
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
                            <div class="col-sm-12">
                                <label>Address</label>
                                <input type="text" class="form-control readonly"  id="address" name="guestAddress"  autocomplete="off" required>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Address</h5>
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
                            <div class="form-group col-md-12">
                                <label>Street</label>
                                <input type="text" class="form-control" id="street">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="input-label required-label">City</label>
                                <select name="city" id="city" class="form-control">
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
                                <select name="province" id="province" class="form-control">
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

$(function(){
    $('#generate').on('click', function(){
        var unit = $('#unit').val() != '' ? $('#unit').val() : '';
        var buildingName = $('#buildingName').val() != '' ? " "+$('#buildingName').val() : '';
        var bldgNumber = $('#bldgNumber').val() != '' ? " "+$('#bldgNumber').val() : '';
        var street = $('#street').val() != '' ? " "+$('#street').val() : '';
        var province = $('#province option:selected').val() ? ", "+$('#province option:selected').val() : '';
        var city = $('#city option:selected').val() ? ", "+$('#city option:selected').val() : '';
        var str = unit+buildingName+bldgNumber+street+city+province;
        $('#address').val(str.replace(/^,/, '').trim()); // remove comma and space on first index
        // $('#address').val(str.replace(/^ /, '')); // remove comma on index
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