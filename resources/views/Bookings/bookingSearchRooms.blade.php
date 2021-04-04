@extends('dashboard')
@section('content2')


<style>
    body
		{
          background-color:#ebebeb;
		}
</style>

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('booking.searchAvailableRooms')}}">
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
                    <label>Check-in date:</label>
                    <input id="datetimepicker4" class="form-control thisDate" type="text" name="checkoutDate" autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12">
                    <label>Number of guest:</label>
                    <input type="number" class="form-control" name="numberOfGuest" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="btn btn-deep-orange float-left" type="submit">Search</button>
                    <button class="btn btn-dark float-right" type="button" onclick="window.location='{{ route('booking.index') }}'">Cancel</button>
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

    });

</script>

@endsection