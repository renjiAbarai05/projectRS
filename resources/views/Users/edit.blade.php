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
<div class="container mb-5">
    <div class="header-banner mt-5">
        <p class="p-0 m-0 header d-inline">UPDATE USER</p>
    </div>
    <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
    @METHOD('PUT')
    @csrf
    <div class="divContainer mt-n2">
        <div class="form-row mb-4">
            <div class="form-group col-md-12">
                <label>Username</label>
                <input type="text"class="form-control" name="username" required value="{{$user->username}}">
            </div>
            {{-- <div class="form-group col-md-6">
                <label>Password</label>
                <input type="text" class="form-control" name="password" required>
            </div> --}}
            <div class="form-group col-md-4">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastName" required value="{{$user->lastName}}">
            </div>
            <div class="form-group col-md-4">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstName" required value="{{$user->firstName}}">
            </div>
            <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middleName" value="{{$user->middleName}}">
            </div>
            <div class="form-group col-sm-12">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{$user->address}}">
            </div>
            <div class="form-group col-md-6">
                <label>Birth Date</label>
                <input type="date" class="form-control" name="birthDate" value="{{$user->birthDate}}">
            </div>
            <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="number" value="{{$user->number}}">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-block">Update</button>
    </div>
    </form>
</div>

@endsection