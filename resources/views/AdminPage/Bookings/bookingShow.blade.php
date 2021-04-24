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
  
    </div>
</div>
</nav>
<div class="container" style="margin-top:-20px;">
            <div class="row">
                <div class="col-sm-6">
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
                                    <p class='viewText pl-3'><b>{{$bookingData->guestNumber}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Address</div>
                                    <p class='viewText pl-3'><b>{{$bookingData->guestAddress}} </b></p>
                                </div>
                            </div>
                        </div>

                        <div class="DivTemplate mt-3">
                            @if($bookingData->cancelled == 0)
                                @if($bookingData->bookingStatus == 0)
                                <a class="float-right" style="color: #fc8621;  font-weight:bold; letter-spacing: 0.5px; font-size: 13px; border:1px solid #fc8621; border-radius:5px;" onclick="AddRoom()">ADD ROOM</a>
                                @endif
                            @endif
                            <div class="DivHeaderText">ROOM DETAILS</div>
                            <div class="hr my-1" style="height:2px;"></div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Check-in Date:</div>
                                    <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkinDate),"M j,Y g:i A")}}</b></p>
                                    <input type="hidden" value="{{$bookingData->checkinDate}}" id="checkinDateValue">
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Check-out Date:</div>
                                    <p class='viewText pl-3'><b>{{date_format(\Carbon\Carbon::parse($bookingData->checkoutDate),"M j,Y g:i A")}}</b></p>
                                    <input type="hidden" value="{{$bookingData->checkoutDate}}" id="checkoutDateValue">
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
                                        @foreach($thisRoom as $thisRoom)
                                            <tr>
                                                <td>{{$thisRoom->roomNumber}}</td>
                                                <td>{{$thisRoom->roomName}}</td>
                                                <td>₱{{$thisRoom->roomPrice}} By {{$thisRoom->roomRate}} Hours</td>
                                                <input type="hidden" class="roomPriceAndRate" data-roomPrice="{{$thisRoom->roomPrice}}" data-roomRate="{{$thisRoom->roomRate}}">
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="DivTemplate mt-3 mb-5">
                            <div class="DivHeaderText">SUMMARY</div>
                            <div class="hr my-1" style="height:2px;"></div>
                            <table class="table table-bordered">
                                <tr  class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Status</th>
                                    <td>@if($bookingData->paymentStatus == 0)No Payment @elseif($bookingData->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                                </tr>
                                <tr  class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Total Bill</th>
                                    <td id="total_bill"></td>
                                </tr>
                                <tr class="thead-light DivHeaderText">
                                    <th class="th-text" width="150px">Total Payment</th>
                                    <td id="total_payment" style="color:#8cbd01;"></td>
                                </tr>
                                <tr id="balance-tr" class="thead-light DivHeaderText">
                                    <th class="th-text">Total Balance</th>
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
                                    <th class="th-text">Payment Method</th>
                                </tr>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{date_format($payment->created_at,"M j,Y g:i A")}}</td>
                                            <td class="cash_received_value">{{number_format($payment->cashReceived, 2)}}</td>
                                            <td class="cash_change_value">{{number_format($payment->changeAmount, 2)}}</td>
                                            <td class="">{{$payment->paymentMethod}}</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>

                    @if($bookingData->cancelled == 0)
                        {{-- Buttons --}}
                        @if($bookingData->bookingStatus == 0)
                            <button type="button" class="search-button mt-1" id="addPaymentBtn" style="width:100%; border-radius:3px;" onclick="openPaymentModal()">Add payment</button>
                            <button type="button" class="print-button mt-1" id="reschedule" style="width:100%; border-radius:3px;" onclick="bookingReschedule()">Reschedule</button>
                            <button type="button" class="delete-button mt-1" id="cancelBtn" style="width:100%; border-radius:3px;" onclick="cancelBooking()">Cancel Booking</button>
                            <button type="button" class="update-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('booking.index') }}'">Back</button>
                        @elseif($bookingData->bookingStatus == 2)
                            <button type="button" class="print-button" style="width:100%; border-radius:3px;" onclick="window.open('{{ route('bookingPdf', $bookingData->id) }}')">Print</button>
                            <button type="button" class="update-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('booking.viewHistory') }}'">Back</button>
                        @endif
                    @else
                            <button type="button" class="update-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('booking.viewCancelled') }}'">Back</button>
                    @endif
                </div>
            </div>
</div>


{{-- FORMS --}}
<form id="deleteForm" method="POST" action="{{ route('booking.destroy',$bookingData->id) }}">
    @csrf
    @method('DELETE')
</form>

<form id="addRoomForm" method="POST" action="{{ route('booking.searchAvailableRooms') }}">
    @csrf
        <input type="hidden" value="{{$bookingData->checkinDate}}" name="checkinDate">
        <input type="hidden" value="{{$bookingData->checkoutDate}}" name="checkoutDate">
        <input type="hidden" value="update" name="searchCategory">
        <input type="hidden" value="{{$bookingData->id}}" name="bookingId">
        <input type="hidden" value="{{$bookingData->paymentStatus}}" name="bookingPaymentStatus">
</form>

<form id="rescheduleForm" method="POST" action="{{ route('rescheduleBooking') }}">
    @csrf
        <input type="hidden" value="{{$bookingData->id}}" name="bookingId">
</form>



<form class="form-horizontal" method="POST" action="{{route('booking.addPayment')}}">
    @csrf
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px; z-index: 1000000; margin-left: 150px">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="DivHeaderText w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215; ">ADD PAYMENT</h5>
        </div>
        <div class="modal-body mx-3 mb-3">
            <input type="hidden" name="bookingId" value="{{$bookingData->id}}">
            <div class="row mt-2" id="balanceDiv">
                <div class="col-sm-12" >
                    <div style="background-color:red; width:100%; height:70px; border-radius: 3px;">
                        <label style="font-size:40px!important; color:white; margin-left:5px;">Balance:</label>
                        <label style="font-size:40px!important; color:white; margin-left:3px;" id="balanceOutput">0</label>
                        <input type="hidden" id="balanceAmount" name="balanceAmount" value="">
                    </div>
                </div>
            </div>
            <div class="row mt-2" id="changeDiv">
                <div class="col-sm-12" >
                    <div style="background-color:#00a86b; width:100%; height:70px; border-radius: 3px;">
                        <label style="font-size:40px!important; color:white; margin-left:5px;">Change:</label>
                        <label style="font-size:40px!important; color:white; margin-left:3px;" id="changeOutput">0</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Payment Amount</label>
                    <input type="number" class="form-control" name="cashReceived" id="cashReceived" onchange="AddPaymentChange(this)" required>
                    <input type="hidden" id="changeInput" name="amountChange" value="0">
                </div>
            </div>
            <div class="row mt-1 pb-2">
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
        <div class="row px-4 pb-4">
            <div class="col-sm-12">
                <button class="save-button" type="submit">Add</button>
                <button class="back-button float-right" type="button" onclick="$('#paymentModal').modal('hide');">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
    
        $('#total_payment').html("₱" + parseFloat(cashReceived() - cashChange()).toFixed(2));
      
        if($('#total_payment').text().replace(/[^\d.-]/g, '') > 0){
            $('#cancelBtn').hide();
        }

        $('#changeDiv').hide();
        
        

        var checkInDate = $('#checkinDateValue').val(),
            checkOutDate = $('#checkoutDateValue').val();
        
        var ckInDate = new Date(checkInDate),
            ckOutDate = new Date(checkOutDate);

        var hours = Math.abs(ckInDate - ckOutDate) / 36e5;

        var totalBill = 0;
        $('.roomPriceAndRate').each(function(){
            var roomRate = $(this).attr('data-roomRate'),
                roomPrice = $(this).attr('data-roomPrice');
             totalBill += (roomPrice / roomRate) * hours;
        });


        $('#total_bill').html('₱'+totalBill.toFixed(2));
        showBalance();
    });

    function AddPaymentChange(ThisInput){
               var cashReceived = parseFloat($(ThisInput).val()),
                balanceAmount = parseFloat($('#balance_total').text().replace(/[^\d.-]/g, ''));
                var balance =  0;
                var change = 0;

            if($(ThisInput).val() != ""){
                if(cashReceived >= balanceAmount){
                    change =  cashReceived - balanceAmount;
                    $('#changeDiv').show();
                    $('#balanceDiv').hide();
                }else if(cashReceived < balanceAmount){
                    balance = balanceAmount - cashReceived;
                    $('#changeDiv').hide();
                    $('#balanceDiv').show();
                }
                $('#balanceOutput').html('₱'+balance.toFixed(2));
                $('#changeOutput').html('₱'+change.toFixed(2));
                $('#changeInput').val(change);
            }else{
                $('#balanceOutput').html('₱'+balanceAmount.toFixed(2));
                $('#changeOutput').html('₱'+change.toFixed(2));
                $('#changeInput').val(change);
                $('#changeDiv').hide();
                $('#balanceDiv').show();
            }
                
    }

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
    var orderTotal = parseFloat($('#total_bill').text().replace(/[^\d.-]/g, ''));
    var cashReceived = parseFloat($('#total_payment').text().replace(/[^\d.-]/g, ''));
    var balance = orderTotal - cashReceived;

    $('#balance_total').html("₱" + parseFloat(balance).toFixed(2));

    if(balance <= 0){
        $('#balance-tr').hide();
        $('#addPaymentBtn').hide();
    }

    if(cashReceived == 0){
        $('#balance-tr').hide();
    }
}

function openPaymentModal(){
    $('#paymentModal').modal('show');
    $('#balanceOutput').html($('#balance_total').text());
    $('#balanceAmount').val($('#balance_total').text().replace(/[^\d.-]/g, ''));
    
}

function cancelBooking(){
    Swal.fire({
        title: 'Are you sure You want to Cancel this Booking?',
        text: "You won't be able to revert this and the payment is non-refundable!",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteForm').submit();
            }
        });
}

function AddRoom(){

    let timerInterval
        Swal.fire({
            title: 'Search Available Room...',
            timer: 2000,
            allowOutsideClick: false,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                    b.textContent = Swal.getTimerLeft()
                    }
                }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
             $('#addRoomForm').submit();
        });
}


function bookingReschedule(){
    Swal.fire({
        title: 'Are you sure You want to Reschedule this Booking?',
        text: "You need to Select Another Available room if you change the date of your booking.",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#rescheduleForm').submit();
            }
        });
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