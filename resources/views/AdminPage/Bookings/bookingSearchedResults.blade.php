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
   
    </div>
</div>
</nav>
<div class="container" style="margin-top:-20px;">
<form class="form-horizontal" method="POST" action="{{ route('booking.createBooking')}}" id="BookForm">
    @csrf
    <input type="hidden" name="checkIN" value="{{$dateID}}">
    <input type="hidden" name="checkOUT" value="{{$dateOD}}">
    <div class="row">
        <div class="col-sm-7">
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
                                        <input type="hidden" class="roomId" value="{{$data->id}}">
                                        <td class="td-border">
                                            {{$data->roomType}}
                                        </td>
                                        <td class="td-border">
                                            ₱{{$data->price}} By {{$data->roomRate}} Hours
                                        </td>
                                        <td class="td-border">
                                            {{$data->capacity}}
                                        </td>
                                        <td class="td-border">
                                            <input type="checkbox" onchange="roomCheck(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-5">
                 <button class="save-button mt-3" type="button" onclick="submitForm()" style="width:100%; border-radius:3px;">Book Now</button>
                 <button class="save-button mt-2" type="button" style="width:100%; border-radius:3px;" onclick="window.location='{{ route('booking.create') }}'">Search Again</button>
                 <button class="back-button mt-2" type="button" style="width:100%; border-radius:3px;"  onclick="window.location='{{ route('booking.index') }}'">Cancel</button>
        </div>
    </div>
</form>

               
       
</div>

<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });
});

roomsCount = 0;

function roomCheck(thisBtn){
    var roomId = $(thisBtn).closest("tr").find('.roomId');

    if ($(thisBtn).is(':checked')) {
        roomsCount++;
            roomId.attr('name', 'rooms['+roomsCount+'][roomId]');
    } else {
        roomsCount--;
            roomId.removeAttr('name');
    }
}

function submitForm(){
    if(roomsCount != 0){
        $('#BookForm').submit();
    }else{
        Swal.fire('Please Select Room First.');
    }
    
}
</script>

@endsection