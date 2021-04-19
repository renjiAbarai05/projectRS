@extends('AdminPage.masterAdmin')
@section('content2')


<style>
    .swal2-modal{
            margin-left:42% !important;
            margin-top:14% !important;
        }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-primaryToggle">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <h4 class="ml-2 mt-2">SALES REPORTS</h4>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item   @if (Session::get("report") == 'dailyView') active @endif">
                    <a class="nav-link" href="{{route('dailyView')}}">Daily View</a>
                </li>
                <li class="nav-item  @if (Session::get("report") == 'specificDayView') active @endif">
                    <a class="nav-link" href="{{route('specificDayView')}}">Specific Day View</a>
                </li>
                <li class="nav-item   @if (Session::get("report") == 'monthlyView') active @endif">
                    <a class="nav-link" href="{{ route('monthlyView') }}">Monthly View</a>
                </li>
                <li class="nav-item   @if (Session::get("report") == 'yearlyView') active @endif">
                    <a class="nav-link" href="{{ route('yearlyView') }}">Yearly View</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top:-20px;">
   
    @yield('reportContent')
   
</div>

@endsection