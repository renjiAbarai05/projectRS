@extends('AdminPage.Bookings.BookingIndex.bookingIndexMaster')
@section('booking')

<div class="DivTemplate">
    <p class="DivHeaderText center-align">Today's Booking</p>
    <div class="hr"></div>
            <div class="table-responsive mt-3">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                        <th class="th-sm th-border" width="200px">Date</th>
                        <th class="th-sm th-border">Guest Name</th>
                        <th class="th-sm th-border">Total Bill</th>
                        <th class="th-sm th-border">Status</th>
                        <th class="th-sm th-border text-center" width="100px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                          @foreach($booked as $booked)
                            <tr class="data font-weight-bold">
                              <td class="td-border"> {{date('F j, Y', strtotime($booked->checkinDate)) }} to {{ date('F j, Y', strtotime($booked->checkoutDate)) }}</td>
                              <td class="td-border">{{$booked->guestFullName}}</td>
                              <td class="th-sm td-border">₱{{$booked->billAmount}}</td>
                              <td class="th-sm td-border">@if($booked->paymentStatus == 0)No Payment @elseif($booked->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                              <td class="td-border text-center">
                                <button class="update-button" data-paymentStatus="{{$booked->paymentStatus}}" onclick="CheckinModal(this)" style="color:white; width:100%;">Check-in </button>
                              </td>
                          </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
</div>


<div class="modal fade" id="checkinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px; z-index: 1000000; margin-left: 150px">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="DivHeaderText w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215;">Check-in</h5>
        </div>
          <div class="modal-body mx-3 mb-3">
              <button onclick="window.location='{{ route('booking.show',$booked->id) }}'" id="addPaymentBtn">ADD PAYMENT</button>
              <button>ADD ANOTHER ROOM</button>
              <button id="checkIdBtn">CHECK-IN</button>
          </div>
        </div>
    </div>
</div>

        
<script>
  function CheckinModal(thisBtn){
    $('#checkinModal').modal('show');

    var paymentStatus = $(thisBtn).attr('data-paymentStatus');

    if(paymentStatus == 1){
        $('#addPaymentBtn').show();
        $('#checkIdBtn').hide();
    }else{
      $('#addPaymentBtn').hide();
      $('#checkIdBtn').show();
    }


  }
</script>


@endsection