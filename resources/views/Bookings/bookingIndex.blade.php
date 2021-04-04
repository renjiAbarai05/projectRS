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
</style>

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div style="padding:1%;">
        <div class="d-flex flex-column">
            <div class="HeaderBanner p-2 px-1">
                <span class="HeaderBannerText">BOOKINGS</span>
                <i class="fas fa-plus add-button mt-1 ml-1"  onclick="window.location='{{ route('booking.create') }}'"  style="cursor: pointer; float:right"></i>
            </div>
                <div class="flex DivLinks-bg" >
                    <ul class="mb-1">
                        <li class="DivLinks-header p-1" style="margin-left:-30px">
                            <a class="header-link" onclick="window.location='{{ route('booking.index') }}'">View Booking All</a>
                        </li>
                        <span class="DivLinks-divider">|</span>
                        <li class="DivLinks-header p-1 pl-2">
                            <a class="header-link" onclick="window.location='{{ route('booking.viewToday') }}'">View Booking Today</a>
                        </li>
                        <span class="DivLinks-divider">|</span>
                        <li class="DivLinks-header p-1 pl-2">
                            <a class="header-link" onclick="window.location='{{ route('booking.viewCheckedIn') }}'">View Checked-in</a>
                        </li>
                        <span class="DivLinks-divider">|</span>
                        <li class="DivLinks-header p-1 pl-2">
                            <a class="header-link" onclick="window.location='{{ route('booking.viewHistory') }}'">View History</a>
                        </li>
                    </ul>
                </div>
            </div>
        
        <div class="DivTemplate">
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border" width="200px">Date</th>
                          <th class="th-sm th-border">Guest Name</th>
                          <th class="th-sm th-border">Total Bill</th>
                          <th class="th-sm th-border">Status</th>
                          <th class="th-sm th-border text-center" width="100px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($booked as $booked)
                            <tr class="data font-weight-bold">
                              <td class="td-border"> {{date('F j, Y', strtotime($booked->checkinDate)) }} to {{ date('F j, Y', strtotime($booked->checkoutDate)) }}</td>
                              <td class="td-border">{{$booked->guestFullName}}</td>
                              <td class="th-sm td-border">₱{{$booked->billAmount}}</td>
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

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        $('#datetimepicker3').datetimepicker({
            minDate: today, //today is minimum date
        });

        $('#datetimepicker4').datetimepicker({
            minDate: today, //today is minimum date
        });

    });


function addPaymentModal(){
    $('#paymentModal').modal('show');
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