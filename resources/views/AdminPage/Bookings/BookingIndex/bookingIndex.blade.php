@extends('AdminPage.Bookings.BookingIndex.bookingIndexMaster')
@section('booking')

<div class="DivTemplate">
    <i class="fas fa-plus add-button"  onclick="window.location='{{ route('booking.create') }}'"  style="cursor: pointer; float:right; margin-top:1px;"></i>
    <p class="DivHeaderText center-align">All Bookings</p>
    <div class="hr"></div>
    <div class="table-responsive mt-3">
        <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
            <thead class="thead-bg">
                <tr>
                    <th class="th-sm th-border" width="150px">Check-in Date</th>
                    <th class="th-sm th-border" width="150px">Check-out Date</th>
                    <th class="th-sm th-border">Guest Name</th>
                    {{-- <th class="th-sm th-border">Total Bill</th> --}}
                    <th class="th-sm th-border"  width="100px">Status</th>
                    <th class="th-sm th-border text-center" width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($booked as $booked)
                    <tr class="data font-weight-bold">
                        <td class="td-border"> {{date('F j, Y g:i A', strtotime($booked->checkinDate)) }} </td>
                        <td class="td-border"> {{ date('F j, Y g:i A', strtotime($booked->checkoutDate)) }}</td>
                        <td class="td-border">{{$booked->guestFullName}}</td>
                        {{-- <td class="th-sm td-border">₱{{$booked->billAmount}}</td> --}}
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