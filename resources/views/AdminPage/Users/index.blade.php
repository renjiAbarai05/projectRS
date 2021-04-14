@extends('AdminPage.Users.userMaster')
@section('users')

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

.DivHeaderText{
    font-weight: bold;
    color:#fc8621;
    letter-spacing: 1px;
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
 @media(max-width: 490px){
    .partition{
        margin-top: 40px;
    }
}
</style> 


    <div class="DivTemplate">
        <i class="fas fa-plus add-button mr-1"  onclick="window.location='{{ route('users.create') }}'"  style="cursor: pointer; float:right; margin-top:1px;"></i>
        <p class="DivHeaderText center-align">ROOM LIST</p>
        <div class="hr"></div>
    </div>


    @foreach ($users as $user)
    <div class="DivTemplate">
        <div class="row mt-4">
            <div class="col-xl-4">
                <table class="mx-auto mt-1" style="height: 65%; width:100%;">
                    <tr class="text-center">
                        <td class="align-middle">
                            @if ($user->picture != null)
                            <img class="imgSize" src="{{ asset('images/UserPhoto/'.$user->picture) }}" alt="#" style="width: 110px; height: 110px;">
                            @else
                            <img class="imgSize" src="{{ asset('images/defaultpic.jpg') }}" alt="#" style="width: 110px; height: 110px">
                            @endif
                        </td>
                    </tr>
                </table>
                <button class="update-button w-100 mt-3" onclick="window.location = '{{ route('users.edit', $user->id) }}'">UPDATE</button>
            </div>
            <div class="col-xl-8">
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
                        <p class="data pl-4">{{$user->email ?? 'N/A'}}</p>
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