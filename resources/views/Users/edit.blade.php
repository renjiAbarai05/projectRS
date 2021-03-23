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

      /* Upload Button - Input Field */
.fileContainer {
    overflow: hidden;
    position: relative;
    background: linear-gradient(40deg, #fc8621, #f9e0ae);
    color: white;
    padding: 9px;
    border: none;
    width: 100%;
    border-radius: 50px;
}
.fileContainer:hover {
    background: linear-gradient(40deg, #fc8621, #f9e0ae);
}
.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}
</style>

@include('Layouts.cropImageModal')
<link href="{{ asset('css/croppie.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>

<form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
    @METHOD('PUT')
    @csrf
<div class="container mb-5">
    <div class="header-banner  mt-3">
        <p class="p-0 m-0 header d-inline">USER PHOTO</p>
    </div>
    <div class="divContainer mt-n2">
        <div class="row">
            <div class="col-sm-12">
                <div class="p-3 ">
                    <div class="d-flex justify-content-center">
                        <img id='photoDisplay' class='mx-auto' src='{{ $user->picture!=null ? asset('images/UserPhoto/'.$user->picture) : asset('images/defaultpic.jpg') }}' style='border: 3px solid #0996c1; height: 145px; width: 145px; background-size: cover; border-radius: 50%; margin-bottom: 15px'>
                    </div>
                    <button type="button" class="fileContainer mx-auto d-block" style="width: 45%">
                        Upload Photo
                        <input type="file" name="user_photo" id="user_photo">
                    </button>
                    <input type="hidden" id='photoSaving' name="picture"  class='form-control'>
                </div>
            </div>
        </div>
    </div>

    <div class="header-banner mt-2">
        <p class="p-0 m-0 header d-inline">UPDATE USER</p>
    </div>
  
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


<script>
    $(document).ready(function(){
       //Crop image
      $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                    width:200,
                    height:200,
                    type:'square' //circle
                    },
                    boundary:{
                    width:300,
                    height:300
                    }
                });
    
                $('#user_photo').on('change', function(){
                    var reader = new FileReader();
                    reader.onload = function (event) {
                     $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#uploadimageModal').modal('show');
                });
    
                $('.crop_image').click(function(event){
                    $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                    }).then(function(response){
                    $('#photoDisplay').attr('src', response);
                    $("#photoSaving").val(response);
                    $('#uploadimageModal').modal('hide');
                    })
                });
              
       
    
        $(function () {
              $("#user_photo").change(function () {
                  readURL(this);
              });
          });
    
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      //alert(e.target.result);
                      $('#Photo').attr('src', e.target.result);
                  };
    
                  reader.readAsDataURL(input.files[0]);
              }
          }
    });
       
    </script>
@endsection