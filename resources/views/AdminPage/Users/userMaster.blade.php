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

        <h4 class="ml-2 mt-2">USER MANAGEMENT</h4>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item @if (Session::get("usermanagement") == 'userAccount') active @endif">
                    <a class="nav-link" href="{{ route('users.index') }}">User Account</a>
                </li>
                <li class="nav-item @if (Session::get("usermanagement") == 'verifiedCustomerAccount') active @endif">
                    <a class="nav-link" href="{{ route('verifiedCustomerAccount') }}">Verified Customer Account</a>
                </li>
                <li class="nav-item  @if (Session::get("usermanagement") == 'newCustomerAccount') active @endif">
                    <a class="nav-link" href="{{ route('newCustomerAccount') }}">New Customer Account</a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top:-20px;">
     @yield('users')
</div>


<script>
$(document).ready(function(){
    $('#TblSorter').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 2 }
        ],
        "order": [[ 0, "desc" ]],
    });
});

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