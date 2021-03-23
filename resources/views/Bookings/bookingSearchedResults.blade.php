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
        /* hide input field for searching */
        div.dataTables_wrapper div.dataTables_filter {
            display: none;
            text-align: right;
        }
</style>

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="container" style="margin-top: 20px">
        <div class="header-banner">
            <p class="p-0 m-0 header d-inline">AVAILABLE ROOMS</p>
            {{-- <button id="bookNowButton" style="border:none; background:none; float:right;"><i class="fas fa-plus add-button"></i></button> --}}
        </div>
        <div class="divContainer mt-n2">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table table-striped table-bordered table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          {{-- <th class="th-sm">Date</th> --}}
                          <th class="th-sm">Room Name</th>
                          <th class="th-sm">Room Number</th>
                          <th class="th-sm">Price</th>
                          <th class="th-sm">Details</th>
                          <th class="th-sm text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($availableRooms as $availableRoom)
                            <tr  class="data font-weight-bold">
                              {{-- <td>{{$booked->checkinDate}} to {{$booked->checkoutDate}}</td> --}}
                                <td>{{$availableRoom->roomType}}</td>
                                <td>
                                    {{$availableRoom->roomNumber}}
                                </td>
                                <td>
                                    {{$availableRoom->price}}
                                </td>
                                <td>
                                    {{$availableRoom->details}}
                                </td>
                                <td class="text-center">
                                    <button class="update-button" style="color:white; width:100%;" data-id="{{$availableRoom->id}}" onclick="checkinModal(this)">Checkin</button>
                                </td>
                          </tr>
                    @endforeach
                  </tbody>
              </table>
             
          </div>
        </div>
        
    </div>
{{-- </div> --}}

{{-- Edit Modal --}}
<form class="form-horizontal" method="POST" id="update_form">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 50px; z-index: 1000000">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215"><u>CHECKIN</u></h4>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
                <div class="modal-body mx-3 mb-3">
                <div class="row mt-1">
                        <div class="col-sm-12">
                            <label>Room Name:</label>
                        <input type="text" class="form-control" id="update-roomName" name="roomType" required>
                        </div>
                </div>
                <div class="row mt-1">
                        <div class="col-sm-12">
                            <label>Number Number:</label>
                            <input type="number" class="form-control" id="update-roomNum" name="roomNumber" required>
                        </div>
                    </div>
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <label>Price per day:</label>
                        <input type="number" class="form-control" id="update-price" name="price" required>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <label>Details:</label>
                        <textarea class="form-control" id="update-details" name="details"></textarea>
                    </div>
                </div>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col-sm-12">
                        <button class="save-button">Save</button>
                        <button class="back-button float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function(){
    
    $('#bookNowButton').click(function(){
            $('#bookNowCreate').modal('show');
    });

    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });
});


// function checkinModal(){
//     $('#bookNowUpdate').modal('show');
// }

function checkinModal(thisRow){
    var id = $(thisRow).attr('data-id'),
    //     roomName = $(thisRow).attr('data-name'),
    //     roomNumber = $(thisRow).attr('data-roomNum'),
    //     price = $(thisRow).attr('data-price'),
    //     details = $(thisRow).attr('data-details');

    // var url = "{{ route('roomList.update', ':id') }}";
    //     url = url.replace(':id', id);
    //     $('#update_form').attr('action', url);

    //     $('#update-roomName').val(roomName);
    //     $('#update-roomNum').val(roomNumber);
    //     $('#update-price').val(price);
    //     $('#update-details').val(details);
        $('#editCategoryModal').modal('show');
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