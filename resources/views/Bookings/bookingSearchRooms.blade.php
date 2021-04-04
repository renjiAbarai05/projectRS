@extends('dashboard')
@section('content2')


<style>
    body
		{
          background-color:#ebebeb;
		}

        .swal2-modal{
            margin-left:42% !important;
            margin-top:14% !important;
        }

</style>

@include('layouts.vtab')

<form class="form-horizontal" id="searchForm" method="POST" action="{{route('booking.searchAvailableRooms')}}">
    @csrf
    <div class="content content-margin pb-2" id="content">
        <div class="container"  style="margin-top: 20px; width:50%;">
        <div class="header-banner mt-5">
            <p class="p-0 m-0 header d-inline">SEARCH AVAILABLE ROOM</p>
        </div>
        <div class="divContainer mt-n2">
            <div class="row mt-2 pb-2">
                <div class="col-sm-6">
                    <label>Check-in date:</label>
                    <input id="datetimepicker3" class="form-control thisDate" type="text" name="checkinDate" autocomplete="off">
                </div>
                <div class="col-sm-6">
                    <label>Check-out date:</label>
                    <input id="datetimepicker4" class="form-control thisDate" type="text" name="checkoutDate" autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12">
                    <label>Number of guest:</label>
                    <input type="number" id="numberOfGuest" class="form-control" name="numberOfGuest" autocomplete="off" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="save-button float-left" type="button" onclick="searchEffect()">Search</button>
                    <button class="back-button float-right" type="button" onclick="window.location='{{ route('booking.index') }}'">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
{{-- </div> --}}

<script>
    $(document).ready(function(){
        
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        $('#datetimepicker3').datetimepicker({
            minDate: today, //today is minimum date
            format:'M j,Y g:i A',
        });

        $('#datetimepicker4').datetimepicker({
            minDate: today, //today is minimum date
            format:'M j,Y g:i A',
        });

        $('#datetimepicker3').change(function(){
            datePicker4($(this).val());
        });

    });

    function datePicker4(thisVal){
        var today = new Date(thisVal);
        $('#datetimepicker4').datetimepicker({
            minDate: today, //today is minimum date
            format:'M j,Y g:i A',
        });
    }

    function searchEffect(){

      if($('#datetimepicker3').val() == ""){
            Swal.fire('Check-in date is Required.');
      }else if($('#datetimepicker4').val() == ""){
            Swal.fire('Check-out date is Required.');
      }else if($('#numberOfGuest').val() == ""){
            Swal.fire('Number of guest is Required.');
      }else{
        let timerInterval
        Swal.fire({
            title: 'Search Available Room...',
            html: 'Searching <b></b> .',
            timer: 2000,
            allowOutsideClick: false,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                    b.textContent = Swal.getTimerLeft()
                    }
                }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            $('#searchForm').submit();
        });
      }

        
    }

</script>

@endsection