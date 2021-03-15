@extends('dashboard')
@section('content2')

<style>
    body{
        background-color:#ebebeb;
    }
    .header-banner{
        background-image: linear-gradient(to right, #fc8621 , #f9e0ae);
        padding: 15px 15px;
        width: 100%;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
</style>
@if (Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="container mb-5">
    <div class="header-banner mt-5">
        <p class="p-0 m-0 header d-inline">CREATE USER</p>
    </div>
    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="divContainer mt-n2">
        <div class="form-row mb-4">
            <div class="form-group col-md-6">
                <label>Username</label>
                <input type="text"class="form-control" name="username" required>
            </div>
            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="text" class="form-control" name="password" required>
            </div>
            <div class="form-group col-md-4">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastName" required>
            </div>
            <div class="form-group col-md-4">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstName" required>
            </div>
            <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middleName">
            </div>
            <div class="form-group col-sm-12">
                <label>Address</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group col-md-6">
                <label>Birth Date</label>
                <input type="date" class="form-control" name="birthDate">
            </div>
            <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="number">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-block">Save</button>
    </div>
    </form>
</div>

@endsection