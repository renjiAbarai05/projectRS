@extends('AdminPage.Bookings.BookingIndex.bookingIndexMaster')
@section('booking')

<div class="DivTemplate">
    <p class="DivHeaderText center-align">Checked-out</p>
    <div class="hr"></div>
            <div class="table-responsive mt-3">
                <table id="TblSorter"  class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                    <tr>
                      <th class="th-sm th-border" width="150px">Checked-out Date</th>
                      <th class="th-sm th-border">Guest Name</th>
                      <th class="th-sm th-border"  width="150px">Booking Status</th>
                      <th class="th-sm th-border text-center" width="100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($booked as $booked)
                          <tr class="data font-weight-bold">
                              <td class="td-border"> {{date('F j, Y g:i A', strtotime($booked->checkedOutTime)) }} </td>
                              <td class="td-border">{{$booked->guestFullName}}</td>
                              <td class="th-sm td-border">@if($booked->bookingStatus == 2)Checked-out @endif</td>
                              <td class="td-border text-center">
                                  <button class="update-button" style="color:white; width:100%;"  onclick="window.location='{{ route('booking.show',$booked->id) }}'">View</button>
                              </td>
                          </tr>
                    @endforeach
                  </tbody>
              </table>
             
          </div>
        </div>
@endsection