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
    .div{

    }
</style>
<div class="container mb-5">
    <div class="header-banner mt-5">
        <p class="p-0 m-0 header d-inline">USERS</p>
        <div class="float-right">
            <a href="{{route('users.create')}}">Add User</a>
        </div>
    </div>
    <div class="divContainer mt-n2">
        <div class="form-row">
        @foreach ($users as $user)
            <div class="form-group col-md-12">
                <div class="card-header">{{$user->lastName}}, {{$user->firstName}} {{$user->middleName ?? ''}}</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <label>Address</label>
                            <p>
                                {{$user->address ?? 'N/A'}}
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <label>Contact Number</label>
                            <p>
                                {{$user->number ?? 'N/A'}}
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <label>Email</label>
                            <p>
                                {{$user->email ?? 'N/A'}}
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <label>Birthdate</label>
                            <p>
                                {{$user->birthDate ?? 'N/A'}}
                            </p>
                        </div>
                    </div>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Update</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<script>
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