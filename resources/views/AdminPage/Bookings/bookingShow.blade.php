@extends('AdminPage.masterAdmin')
@section('content2')

<style>
.print-button {
    background-color: #17a2b8;
    border: none;
    color: white;
    padding: 10px;
    font-size: 16px;
    margin: 2px;
    font-weight: 500;
}
.print-button:hover{
    background-color: #007bff;
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
        {{-- <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('booking.index') }}">All Bookings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewToday') }}">Toda's Booking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewCheckedIn') }}">Checked-in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.viewHistory') }}">Checked-out</a>
        </li>
        </ul> --}}
    </div>
</div>
</nav>
<div class="container" style="margin-top:-20px;">
            <div class="row">
                <div class="col-sm-6">
                        <div class="DivTemplate">
                            <div class="DivHeaderText">ROOM DETAILS</div>
                        <div class="hr my-1" style="height:2px;"></div>
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
                            <div class='row' >
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Number:</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->roomNumber}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Name:</div>
                                
                                    <p class='viewText pl-3'><b>{{$bookingData->roomName}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Rate:</div>
                                    <p class='viewText pl-3'><b>₱{{$bookingData->roomPrice}} By {{$bookingData->roomRate}} Hours </b></p>
                                </div>
                            </div>
                
                           
                        </div>

                        <div class="DivTemplate">
                            <div class="DivHeaderText">GUEST DETAILS</div>
                            <div class="hr my-1" style="height:2px;"></div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Guest Full Name</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestFullName}} </b></p>
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
                                <div class='col-md-6'>
                                    <div class='label text-left'>Address</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestAddress}} </b></p>
                                </div>
                            </div>
                        </div>

                        <div class="DivTemplate mt-3">
                            <div class="DivHeaderText">SUMMARY</div>
                            <div class="hr my-1" style="height:2px;"></div>
                            <table class="table table-bordered">
                                <tr  class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Status</th>
                                    <td>@if($bookingData->paymentStatus == 0)No Payment @elseif($bookingData->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                                </tr>
                                <tr  class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Bill Total</th>
                                    <td id="sub_total">₱{{number_format($bookingData->billAmount, 2)}}</td>
                                </tr>
                                <tr class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Total Payment</th>
                                    <td id="amount_received_total" style="color:#8cbd01;"></td>
                                </tr>
                                <tr id="balance-tr" class="thead-light DivHeaderText">
                                    <th class="th-text" >Balance</th>
                                    <td id="balance_total">0</td>
                                </tr>
                            </table>
                        </div>
                        
                </div>
                <div class="col-sm-6">
                    <div class="DivTemplate mb-3" id="payment-details-div">
                        <div class="DivHeaderText">PAYMENT DETAILS</div>
                        <div class="hr my-1" style="height:2px;"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <tr class="thead-light">
                                    <th class="th-text">Date and time</th>
                                    <th class="th-text">Cash Received</th>
                                    <th class="th-text">Change</th>
                                </tr>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{date_format($payment->created_at,"M j,Y g:i A")}}</td>
                                            <td class="cash_received_value">{{number_format($payment->paymentAmount, 2)}}</td>
                                            <td class="cash_change_value">{{number_format($payment->changeAmount, 2)}}</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>

                    <button type="button" class="update-button mt-1" id="addPaymentBtn" style="width:100%; border-radius:3px;" onclick="openPaymentModal()">Add payment</button>
                    <button type="button" class="delete-button mt-1" style="width:100%; border-radius:3px;">Cancel Booking</button>
                    <button type="button" class="print-button mt-1" style="width:100%; border-radius:3px;" onclick="window.open('{{ route('bookingPdf', $bookingData->id) }}')">Print</button>
                    <button type="button" class="back-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('booking.index') }}'">Back</button>
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
            <div class="row mt-2">
                <div class="col-sm-12" >
                    <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                        <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Balance:</b></label>
                        <label style="font-size:40px!important; color:white; margin-left:3px;" id="balanceOutput">0</label>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12" >
                    <div style="background-color:grey; width:100%; height:70px; border-radius: 5px;">
                        <label style="font-size:40px!important; color:white; margin-left:5px;"><b>Change:</b></label>
                        <label style="font-size:40px!important; color:white; margin-left:3px;" id="changeOutput">0</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Payment Amount</label>
                    <input type="number" class="form-control" name="paymentAmount" id="paymentAmount" required>
                    <input type="hidden" class="form-control" id="changeInput" name="amountChange" value="0" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row px-4 pb-4">
            <div class="col-sm-12">
                <button class="save-button" type="submit">Add</button>
                <button class="back-button float-right" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</div>
</form>


<script type="text/javascript">
    $(document).ready(function() {

        $('#amount_received_total').html("₱" + parseFloat(cashReceived() - cashChange()).toFixed(2));

        showBalance();

        $('#paymentAmount').change(function(){
            var paymentAmount = parseFloat($(this).val()),
                balanceAmount = parseFloat($('#balance_total').text().replace(/[^\d.-]/g, ''));
                balance =  parseFloat($('#balance_total').text().replace(/[^\d.-]/g, ''));
                var change = 0;

            if(paymentAmount > balanceAmount){
                change =  paymentAmount - balanceAmount;
                balance = 0;
            }else if(paymentAmount < balanceAmount){
                balance = balanceAmount - paymentAmount;
            }

            $('#balanceOutput').html('₱'+balance.toFixed(2));
            $('#changeOutput').html('₱'+change.toFixed(2));
            $('#changeInput').val(change);
        });
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
    $('#balanceOutput').html($('#balance_total').text());


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