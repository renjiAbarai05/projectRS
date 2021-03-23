@extends('dashboard')
@section('content2')

{{-- <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet" />
<script  defer src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script  defer src="{{ asset('js/moment.min.js') }}"></script> --}}

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<style>
    body
		{
			/* background-image: url('images/home_bg.jpg'); */
			/* background-repeat: no-repeat;
			background-attachment: fixed; */
            /* margin: 0px !important; */
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
        <div class="header-banner">
            <p class="p-0 m-0 header d-inline">CALENDAR</p>
        </div>
        <div class="divContainer mt-n2">
             <div id='calendar'></div>
        </div>
    </div>
{{-- </div> --}}

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
         
        })
    });
</script>



@endsection