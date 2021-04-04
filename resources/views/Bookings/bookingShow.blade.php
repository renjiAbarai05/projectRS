@extends('dashboard')
@section('content2')


<style>
    body
		{
          background-color:#ebebeb;
		}
        .header-banner{
            background-image: linear-gradient(to right, #fc8621 , #f9e0ae);
            padding: 15px 15px;
            width: 100%;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        .data{
            color: #676767;
            font-size: 15px;
            font-weight: bold;
            padding: 0;
            margin: 0;
            padding-left: 10px;
        }
        .add-button{
            color: #c24914;
            font-size: 28px;
            margin-top: -5px;
        }
</style>

@include('layouts.vtab')


    <div class="content content-margin pb-2" id="content">
        <div style="margin-top: 10px; padding:1%;">
            <div class="row">
                <div class="col-sm-6">
                        <div class="DivTemplate">
                            <p class="DivHeaderText center-align">ROOM DETAILS</p>
                            <div class="hr"></div>
                            <div class='row' >
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room #</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->roomNumber}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Name</div>
                                
                                    <p class='viewText pl-3'><b>{{$bookingData->roomName}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Rate</div>
                                    <p class='viewText pl-3'><b>₱{{$bookingData->roomPrice}} By {{$bookingData->roomRate}} Hours </b></p>
                                </div>
                            </div>
                
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Check-in Date:</div>
                                    <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkinDate),"M j,Y g:i A")}}</b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Check-out Date:</div>
                                    <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkoutDate),"M j,Y g:i A")}}</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="DivTemplate">
                            <p class="DivHeaderText center-align">GUEST DETAILS</p>
                            <div class="hr"></div>
                            <div class='row' >
                                <div class='col-md-6'>
                                    <div class='label text-left'>Guest Full Name</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestFullName}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Address</div>
                                   
                                    <p class='viewText pl-3'><b>{{$bookingData->guestAddress}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Contact Number</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestContactNumber}}</b></p>
                                </div>
                            </div>
                            <div class='row' >
                                <div class='col-md-6'>
                                    <div class='label text-left'>Email</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestEmail}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Number of Guest</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->numberOfGuest}} </b></p>
                                </div>
                            </div>
                        </div>

                        <div class="DivTemplate mt-3">
                            <div class="DivHeaderText">SUMMARY</div>
                            <div class="hr mt-1" style="height:2px;"></div>
                            <table class="table table-bordered">
                                <tr  class="thead-light DivHeaderText">
                                    <th width="150px">Status</th>
                                    <td>@if($bookingData->paymentStatus == 0)No Payment @elseif($bookingData->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                                </tr>
                                <tr  class="thead-light DivHeaderText">
                                    <th width="150px">Bill Total</th>
                                    <td id="sub_total">₱{{$bookingData->billAmount}}</td>
                                </tr>
                                <tr class="thead-light DivHeaderText">
                                    <th width="150px">Total Payment</th>
                                    <td id="amount_received_total" style="color:#8cbd01;"></td>
                                </tr>
                                <tr id="balance-tr" class="thead-light DivHeaderText">
                                    <th >Balance</th>
                                    <td id="balance_total">0</td>
                                </tr>
                            </table>
                        </div>
                        
                </div>
                <div class="col-sm-6">
                    <div class="DivTemplate mb-3" id="payment-details-div">
                        <div class="DivHeaderText">PAYMENT DETAILS</div>
                        <div class="hr mt-1" style="height:2px;"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <tr class="thead-light">
                                    <th>Date and time</th>
                                    <th>Cash Received</th>
                                    <th>Change</th>
                                </tr>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{date_format($payment->created_at,"M j,Y g:i A")}}</td>
                                            <td class="cash_received_value">{{$payment->paymentAmount}}</td>
                                            <td class="cash_change_value">{{$payment->changeAmount}}</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>

                    <button type="button" class="update-button mt-1" id="addPaymentBtn" style="width:100%; border-radius:3px;" onclick="openPaymentModal()">Add payment</button>
                    <button type="button" class="delete-button mt-1" style="width:100%; border-radius:3px;">Cancel Booking</button>
                    <button type="button" class="delete-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('booking.index') }}'">Back</button>
                </div>
            </div>
    </div>
</div>





<form class="form-horizontal" method="POST" action="{{route('booking.addPayment')}}">
    @csrf
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px; z-index: 1000000; margin-left: 150px">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="DivHeaderText w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215; ">ADD PAYMENT</h5>
        </div>
        <div class="modal-body mx-3 mb-3">
            <input type="hidden" class="form-control" name="bookingId" value="{{$bookingData->id}}">
            <div class="row mt-1">
                <div class="col-sm-12" >
                    <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                        <label style="font-size:40px!important; color:white; ml-1"><b>Balance:</b></label>
                        <label style="font-size:40px!important; color:white;" id="balanceAmount"></label>
                        <input type="hidden" class="form-control" name="balanceAmount" id="balanceAmountInput">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Payment Amount</label>
                    <input type="number" class="form-control" name="paymentAmount" required>
                </div>
            </div>
        </div>
        <div class="row px-4 pb-4">
            <div class="col-sm-12">
                <button class="save-button btn-deep-orange" type="submit">Add</button>
                <button class="back-button btn-dark float-right" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</div>
</form>
{{-- </div> --}}


<script type="text/javascript">
    $(document).ready(function() {

        var checkInDate = $('#datetimepicker').val(),
            checkOutDate = $('#datetimepicker2').val();

        var ckInDate = new Date(checkInDate),
            ckOutDate = new Date(checkOutDate);

        var hours = Math.abs(ckInDate - ckOutDate) / 36e5;

        var roomPrice = $('#roomPrice').val();

        var roomRate = $('#roomRate').val()

        var totalBill = (hours / roomRate) * roomPrice;

        $('#billAmount').html('₱'+totalBill.toFixed(2));
        $('#billAmountHidden').val(totalBill.toFixed(2));

        $('#amount_received_total').html("₱" + parseFloat(cashReceived() - cashChange()).toFixed(2));

        showBalance();


    });

function cashReceived(){
    var totalCash = 0;
    $('.cash_received_value').each(function(){
        var cashReceived = parseFloat($(this).text().replace(/[^\d.-]/g, ''));
        totalCash += cashReceived;
    });
    return totalCash;
}

function cashChange(){
    var totalChange = 0;
    $('.cash_change_value').each(function(){
        var cashChange = parseFloat($(this).text().replace(/[^\d.-]/g, ''));
        totalChange += cashChange;
    });
    return totalChange;
}

function showBalance(){
    var orderTotal = parseFloat($('#sub_total').text().replace(/[^\d.-]/g, ''));
    var cashReceived = parseFloat($('#amount_received_total').text().replace(/[^\d.-]/g, ''));
    var balance = orderTotal - cashReceived;

    $('#balance_total').html("₱" + parseFloat(balance).toFixed(2));

    if(balance <= 0){
        $('#balance-tr').hide();
        $('#addPaymentBtn').hide();
    }
}

function openPaymentModal(){
    $('#paymentModal').modal('show');
    $('#balanceAmount').html($('#balance_total').text());
    $('#balanceAmountInput').val(parseFloat($('#balance_total').text().replace(/[^\d.-]/g, '')));
}

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