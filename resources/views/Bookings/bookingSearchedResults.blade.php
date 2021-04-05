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
    <div style="padding:1%;">
        <div class="header-banner">
            <p class="p-0 m-0 header d-inline">AVAILABLE ROOMS</p>
        </div>
        <div class="divContainer mt-n2 mb-2">
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
        <div class="row"> 
            <div class="col-sm-6"> <button class="save-button mt-1" type="submit" style="width:100%; border-radius:3px; "  onclick="window.location='{{ route('booking.create') }}'">Search Again</button></div>
            <div class="col-sm-6"><button class="back-button mt-1" type="button" data-dismiss="modal" aria-label="Close" style="width:100%; border-radius:3px;"  onclick="window.location='{{ route('booking.index') }}'">Cancel</button></div>
        </div>
       
        
    </div>
{{-- </div> --}}


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