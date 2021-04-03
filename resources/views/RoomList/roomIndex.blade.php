@extends('dashboard')
@section('content2')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="container" style="margin-top: 20px">
        <div class="HeaderBanner">
            <p class="p-0 m-0 header d-inline">ROOM LIST</p>
        </div>
        <div class="flex DivLinks-bg">
            <ul class="mb-0">
                <li class="DivLinks-header p-2">
                    <a class="header-link" onclick="window.location='{{ route('roomList.create') }}'">Add Room</a>
                </li>
                </li>
            </ul>
        </div>
        <div class="DivTemplate">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border">Room Name</th>
                          <th class="th-sm th-border" >Details</th>
                          <th class="th-sm th-border" width="100px">Price</th>
                          <th class="th-sm th-border" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($roomListData as $data)
                           <tr class="data font-weight-bold">
                              <td class="td-border">{{$data->roomType}}</td>
                              <td class="td-border">{{$data->details}}</td>
                              <td class="td-border">₱{{$data->price}}</td>
                              <td class="td-border">
                                <button class="bg-none" onclick="window.location='{{ route('roomList.edit',$data->id) }}'" title="update"><i class="update-icon fas fa-arrow-alt-circle-up"></i></button>
                                <button class="bg-none" data-id="{{$data->id}}" onclick="deleteModal(this)" title="DELETE"><i class="cancel-icon fas fa-minus-circle"></i></button>
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