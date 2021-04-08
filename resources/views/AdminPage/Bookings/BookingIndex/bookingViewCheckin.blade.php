@extends('AdminPage.Bookings.BookingIndex.bookingIndexMaster')
@section('booking')

<div class="DivTemplate">
    <p class="DivHeaderText center-align">Checked-in</p>
    <div class="hr"></div>
            <div class="table-responsive mt-3">
                <table id="TblSorter"  class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border" width="200px">Date</th>
                          <th class="th-sm th-border">Room Name</th>
                          <th class="th-sm th-border text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                            <tr  class="data font-weight-bold">
                              <td class="td-border">Today</td>
                              <td class="td-border">Room Room</td>
                              <td class="td-border">
                                <button class="update-button" style="color:white; width:100%;">Check-out </button>
                                {{-- <button class="delete-button" style="color:white; width:100%;" > Delete</button> --}}
                              </td>
                          </tr>
                  </tbody>
              </table>
             
          </div>
        </div>
    
@endsection