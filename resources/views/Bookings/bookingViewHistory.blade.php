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
    <div class="container" style="margin-top: 20px">
        <div class="d-flex flex-column">
            <div class="HeaderBanner p-2 px-3">
                <span class="HeaderBannerText">VIEW HISTORY</span>
                <i class="fas fa-plus add-button mt-1 ml-1"  onclick="window.location='{{ route('booking.create') }}'"  style="cursor: pointer; float:right"></i>
            </div>
                <div class="flex DivLinks-bg" >
                    <ul class="mb-1">
                        <li class="DivLinks-header p-1" style="margin-left:-3%;">
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
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter"  class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border" width="200px">Date</th>
                          <th class="th-sm th-border">Room Name</th>
                          <th class="th-sm th-border text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                            <tr  class="data font-weight-bold">
                              <td class="td-border">Today</td>
                              <td class="td-border">Room Room</td>
                              <td class="td-border">
                                <button class="update-button" style="color:white; width:100%;">Check-out </button>
                                {{-- <button class="delete-button" style="color:white; width:100%;" > Delete</button> --}}
                              </td>
                          </tr>
                  </tbody>
              </table>
             
          </div>
        </div>
        
    </div>
{{-- </div> --}}


{{-- BookNowModal --}}
<form method="POST" action="{{route('booking.searchAvailableRooms')}}">
    @csrf
    <div class="modal fade" id="bookNowCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px; z-index: 1000000">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 1px; color: #ef7215"><u>CHECK AVAILABLE ROOMS</u></h4>
            </div>
            <div class="modal-body mx-3 mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Check in</label>
                        <input type="date" class="form-control" name="checkInDate" id="dateInput" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Check out</label>
                        <input type="date" class="form-control" name="checkOutDate" id="dateInput2" required>
                    </div>
                </div>
            </div>
            <div class="row px-4 pb-4">
                <div class="col-sm-12">
                    <button class="save-button" type="submit">Check</button>
                    <button class="back-button float-right" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
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

        dateFunction();
        dateFunction2();

    });



    function updateModal(){
        $('#bookNowUpdate').modal('show');
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


   //Date Function
   function dateFunction(){
    $('#dateInput').change(function(){
        var dateInputVal = $('#dateInput').val();
        var dateHandler =  $('#dateInput').val();
        dateOutput(dateInputVal,dateHandler);
    });

  var dateInputVal = $('#dateInput').val();
  var dateHandler =  $('#dateInput').val();
  dateOutput(dateInputVal,dateHandler);

}

function dateOutput(dateInputVal,dateHandler){
        dateHandler.innerHTML = dateInputVal;
        var months = new Array();
        months[0] = "January";
        months[1] = "February";
        months[2] = "March";
        months[3] = "April";
        months[4] = "May";
        months[5] = "June";
        months[6] = "July";
        months[7] = "August";
        months[8] = "September";
        months[9] = "October";
        months[10] = "November";
        months[11] = "December";
        var date = new Date(dateInputVal);
        var month = months[date.getMonth()];
        //converting the date into array
        var dateArr = dateInputVal.split("-");
        //setting up the new date form
        var forDate = month + " " + dateArr[2] + ", " + dateArr[0];

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#dateInput').attr('min',today);
}


function dateFunction2(){
    $('#dateInpu2t').change(function(){
        var dateInputVal = $('#dateInput2').val();
        var dateHandler =  $('#dateInput2').val();
        dateOutput2(dateInputVal,dateHandler);
    });

  var dateInputVal = $('#dateInput2').val();
  var dateHandler =  $('#dateInput2').val();
  dateOutput2(dateInputVal,dateHandler);

}

function dateOutput2(dateInputVal,dateHandler){
        dateHandler.innerHTML = dateInputVal;
        var months = new Array();
        months[0] = "January";
        months[1] = "February";
        months[2] = "March";
        months[3] = "April";
        months[4] = "May";
        months[5] = "June";
        months[6] = "July";
        months[7] = "August";
        months[8] = "September";
        months[9] = "October";
        months[10] = "November";
        months[11] = "December";
        var date = new Date(dateInputVal);
        var month = months[date.getMonth()];
        //converting the date into array
        var dateArr = dateInputVal.split("-");
        //setting up the new date form
        var forDate = month + " " + dateArr[2] + ", " + dateArr[0];

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#dateInput2').attr('min',today);
}
    </script>

@endsection