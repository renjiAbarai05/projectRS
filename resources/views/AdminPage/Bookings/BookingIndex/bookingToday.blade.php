@extends('AdminPage.Bookings.BookingIndex.bookingIndexMaster')
@section('booking')
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
<div class="DivTemplate">
    <p class="DivHeaderText center-align">Today's Booking</p>
    <div class="hr"></div>
            <div class="table-responsive mt-3">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                        <th class="th-sm th-border" width="150px">Check-in Date</th>
                        <th class="th-sm th-border">Guest Name</th>
                        <th class="th-sm th-border"  width="150px">Payment Status</th>
                        <th class="th-sm th-border text-center" width="100px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                          @foreach($booked as $booked)
                            <tr class="data font-weight-bold">
                                <td class="td-border"> {{date('F j, Y g:i A', strtotime($booked->checkinDate)) }} </td>
                                <td class="td-border">{{$booked->guestFullName}}</td>
                                <td class="th-sm td-border">@if($booked->paymentStatus == 0)No Payment @elseif($booked->paymentStatus == 1) Partially Paid @else Fully Paid @endif</td>
                                <td class="td-border text-center">
                                    <button class="update-button" style="color:white; width:100%;" onclick="window.location='{{ route('booking.show',$booked->id) }}'">Select</button>
                                </td>
                            </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>
</div>


@endsection