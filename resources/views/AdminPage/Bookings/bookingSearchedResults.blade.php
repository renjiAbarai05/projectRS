@extends('AdminPage.masterAdmin')
@section('content2')



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

        <div class="DivTemplate">
            <p class="DivHeaderText center-align">SEARCH AVAILABLE ROOM</p>
            <div class="hr"></div>
                <div class="table-responsive mt-1">
                    <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                    <thead class="thead-bg">
                        <tr>
                            <th class="th-sm th-border">Room Name</th>
                            <th class="th-sm th-border">Room Price</th>
                            <th class="th-sm th-border" width="100px">Capacity</th>
                            <th class="th-sm th-border" width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($roomListData as $data)
                            <tr class="data font-weight-bold">
                                <td class="td-border">{{$data->roomType}}</td>
                                <td class="td-border">₱{{$data->price}} By {{$data->roomRate}} Hours</td>
                                <td class="td-border">{{$data->capacity}}</td>
                                <td class="td-border">
                                    <form class="form-horizontal" method="POST" action="{{ route('booking.createBooking') }}">
                                        @csrf
                                            <input type="hidden" name="checkIN" value="{{$dateID}}">
                                            <input type="hidden" name="checkOUT" value="{{$dateOD}}">
                                            <input type="hidden" name="roomId" value="{{$data->id}}">
                                            <button class="update-button" style="color:white; width:100%;" type="submit">Book</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                
            </div>
            </div>

                <div class="row mt-3"> 
                    <div class="col-sm-6"> <button class="save-button mt-1" type="submit" style="width:100%; border-radius:3px; "  onclick="window.location='{{ route('booking.create') }}'">Search Again</button></div>
                    <div class="col-sm-6"><button class="back-button mt-1" type="button" data-dismiss="modal" aria-label="Close" style="width:100%; border-radius:3px;"  onclick="window.location='{{ route('booking.index') }}'">Cancel</button></div>
                </div>
       
</div>

<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });

    // Swal.fire({
    //     icon: 'success',
    //     title: 'Search Successfully.',
    //     showConfirmButton: false,
    //     timer: 3000,
    // });
});

</script>

@endsection