@extends('dashboard')
@section('content2')


<style>
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
</style>



@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="container" style="margin-top: 20px">
        <div class="header-banner">
            <p class="p-0 m-0 header d-inline">ROOM LIST</p>
            <button id="addCategoryButton" style="border:none; background:none; float:right;"><i class="fas fa-plus add-button"></i></button>
        </div>
        <div class="divContainer mt-n2">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table table-striped table-bordered table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm ">Room Name</th>
                          <th class="th-sm" >Details</th>
                          <th class="th-sm" width="100px">Price</th>
                          <th class="th-sm text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($roomListData as $data)
                           <tr  class="data font-weight-bold">
                              <td>{{$data->roomType}}</td>
                              <td>{{$data->details}}</td>
                              <td>₱{{$data->price}}</td>
                              <td class="text-center">
                                <button class="update-button" style="color:white; width:100%;"
                                data-id="{{$data->id}}" data-name="{{$data->roomType}}" data-roomNum="{{$data->roomNumber}}"
                                data-price="{{$data->price}}" data-details="{{$data->details}}" onclick="updateModal(this)"> Update</button>
                                <button class="delete-button" style="color:white; width:100%;" data-id="{{$data->id}}" onclick="deleteModal(this)"> Delete</button>
                              </td>
                           </tr>
                        @endforeach
                  </tbody>
              </table>
             
          </div>
        </div>
        
    </div>
{{-- </div> --}}


{{-- Create Modal --}}
<form class="form-horizontal" method="POST" action="{{route('roomList.store')}}">
@csrf
    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 50px; z-index: 1000000">
        <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215"><u>ADD ROOM</u></h4>
                    </div>
                    <div class="modal-body mx-3 mb-3">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <label>Room Name:</label>
                            <input type="text" class="form-control" name="roomType" required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <label>Room Number:</label>
                                <input type="number" class="form-control" name="roomNumber" required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <label>Price per day:</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <label>Details:</label>
                                <textarea class="form-control" name="details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row px-4 pb-4">
                        <div class="col-sm-12">
                            <button class="save-button" type="submit">Save</button>
                            <button class="back-button float-right" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>

{{-- Edit Modal --}}
<form class="form-horizontal" method="POST" id="update_form">
    @csrf
    @method('PUT')
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 50px; z-index: 1000000">
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215"><u>EDIT ROOM CATEGORY</u></h4>
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

<form  method='POST' id="delete_form">
    @csrf
    @method('DELETE')
</form>




<script>
    $(document).ready(function(){
        
        $('#addCategoryButton').click(function(){
                $('#createCategoryModal').modal('show');
        });
    
        $('#TblSorter').DataTable({
            "columnDefs": [
            { "orderable": false, "targets": 2 }
            ],
            "order": [[ 0, "desc" ]],
        });
    });



function updateModal(thisRow){
        var id = $(thisRow).attr('data-id'),
            roomName = $(thisRow).attr('data-name'),
            roomNumber = $(thisRow).attr('data-roomNum'),
            price = $(thisRow).attr('data-price'),
            details = $(thisRow).attr('data-details');

    var url = "{{ route('roomList.update', ':id') }}";
        url = url.replace(':id', id);
        $('#update_form').attr('action', url);

        $('#update-roomName').val(roomName);
        $('#update-roomNum').val(roomNumber);
        $('#update-price').val(price);
        $('#update-details').val(details);
        $('#editCategoryModal').modal('show');
}


function deleteModal(thisRow){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick:false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(thisRow).attr('data-id');
                var url = "{{ route('roomList.destroy', ':id') }}";
                    url = url.replace(':id', id);
                $('#delete_form').attr('action', url);
                $('#delete_form').submit();
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