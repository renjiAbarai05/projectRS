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
           <i class="fas fa-plus add-button float-right" style="cursor: pointer;" onclick="window.location='{{ route('roomList.create') }}'"></i>
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
                                <button class="update-button" style="color:white; width:100%;" onclick="window.location='{{ route('roomList.edit',$data->id) }}'">Update</button>
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

<form  method='POST' id="delete_form">
    @csrf
    @method('DELETE')
</form>




<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });
});

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