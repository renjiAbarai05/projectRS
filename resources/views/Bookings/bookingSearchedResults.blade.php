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
        </div>
        <div class="divContainer mt-n2">
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
        
    </div>
{{-- </div> --}}


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


function checkinModal(thisRow){
    var id = $(thisRow).attr('data-id');
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