@extends('dashboard')
@section('content2')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="container" style="margin-top: 20px">
        <div class="HeaderBanner">
            <p class="p-0 m-0 header d-inline">ROOM LIST</p>
            <i class="fas fa-plus add-button mt-1 ml-1"  onclick="window.location='{{ route('roomList.create') }}'"  style="cursor: pointer; float:right"></i>
        </div>
        <div class="flex DivLinks-bg">
           <div class="p-3"></div>
        </div>
        <div class="DivTemplate">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border">Room Number</th>
                          <th class="th-sm th-border" width="300px">Room Name</th>
                          <th class="th-sm th-border">Room Price</th>
                          <th class="th-sm th-border">Capacity</th>
                          <th class="th-sm th-border" width="50px">Status</th>
                          <th class="th-sm th-border" width="100px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($roomListData as $data)
                           <tr class="data font-weight-bold">
                              <td class="td-border">{{$data->roomNumber}}</td>
                              <td class="td-border">{{$data->roomType}}</td>
                              <td class="td-border">₱{{$data->price}} By {{$data->roomRate}} Hours</td>
                              <td class="td-border">{{$data->capacity}}</td>
                              <td class="td-border">@if($data->isActive == 1) Active @else Inactive @endif</td>
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