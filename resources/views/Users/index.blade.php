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
{{-- <div class="container mb-5">
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
</div> --}}



<style>
.partition{
    display: none;
}
.facility-update-btn{
    bottom: 0px;
    position: absolute;
    width: 260px;
}
.update-button{
    max-width: 1200px !important;
}

.imgSize{
    height:100%; 
    width:103%;
}
.DivLinks-bg{
    background-color: white;
    border-radius: 0rem 0rem .75rem .75rem;
}
.header-link{
    color: #ce9540!important;
    letter-spacing: 0.5px;
    font-weight: 500;
    font-size: 13px;
}
.header-link:hover{
    text-decoration: underline!important;
    color: #ce9540;
}
.DivLinks-header{
    display: inline-block;
}

@media(max-width: 1200px){
    .facility-update-btn{
        position: relative;
        width: 100%;
    }
    .partition{
        display: block;
        margin-top: 25px;
    }
    .center-align{
        text-align: center;
    }
    .imgSize{
        height:100%; 
        width:100%;
    } 
}
/* @media(max-width: 490px){
    .partition{
        margin-top: 40px;
    }
} */
</style>

<div class="container pt-2 mt-2 mb-3">
    <div class="d-flex flex-column">
        <div class="header-banner p-2 px-3">
            <span class="HeaderBannerText">USER MANAGEMENT</span>
        </div>
        <div class="flex DivLinks-bg">
            <ul class="mb-0">
                <li class="DivLinks-header p-2">
                    <a class="header-link" href="{{ route('users.create') }}">Add User</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- User Div -->
    @foreach ($users as $user)
    <div class="divContainer mt-3">
        <div class="row">
            <div class="col-xl-3">
                <table class="mx-auto" style="height: 65%; width:100%;">
                    <tr>
                        <td class="align-middle">
                            @if ($user->picture != null)
                            <img class="imgSize" src="{{ asset('images/UserPhoto/'.$user->picture) }}" alt="#">
                            @else
                            <img class="imgSize" src="{{ asset('images/defaultpic.jpg') }}" alt="#">
                            @endif
                        </td>
                    </tr>
                </table>
                <button class="update-button facility-update-btn" onclick="window.location = '{{ route('users.edit', $user->id) }}'">UPDATE</button>
            </div>
            <div class="col-xl-9">
                <div class="hr mb-2 partition"></div>
                <p class="DivHeaderText center-align">USER DETAILS</p>
                <div class="hr"></div>
                <div class="row mt-2">
                    <div class="col-md-7">
                        <div class="label">NAME</div>
                        <p class="data pl-4">{{$user->lastName}}, {{$user->firstName}} {{$user->middleName ?? ''}}</p>
                    </div>
                    <div class="col-md-5">
                        <div class="label">EMAIL</div>
                        {{$user->email ?? 'N/A'}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="label">ADDRESS</div>
                        <p class="data pl-4">
                            {{$user->address ?? 'N/A'}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="label">CONTACT NUMBER</div>
                        <p class="data pl-4">  {{$user->number ?? 'N/A'}}</p>
                    </div>
                    <div class="col-md-7">
                        <div class="label">BIRTH DAY</div>
                        <p class="data pl-4">  {{$user->birthDate ?? 'N/A'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

   
</div> <!-- container -->


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