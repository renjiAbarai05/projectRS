@extends('AdminPage.Users.userMaster')
@section('users')
@include('layouts.phLocations')
<style>

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
.modal-dialog {
    max-width: 700px;
    margin: 1.75rem auto;
}
</style>


<link href="{{ asset('css/croppie.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>
@include('Layouts.cropImageModal')

<form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
    @METHOD('PUT')
    @csrf

    <div class="row">
        <div class="col-sm-6">
            <div class="DivTemplate">
                <p class="DivHeaderText center-align">USER DETAILS</p>
                <div class="hr"></div>
                <div class="form-row mb-4 mt-2">
                    <div class="form-group col-md-12">
                        <label>Username</label>
                        <input type="text"class="form-control" name="username" required value="{{$user->username}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" onkeypress="return /[a-z ]/i.test(event.key)" required value="{{$user->lastName}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" onkeypress="return /[a-z ]/i.test(event.key)" required value="{{$user->firstName}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middleName" onkeypress="return /[a-z ]/i.test(event.key)" value="{{$user->middleName}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Address</label>
                        <input type="text" class="form-control readonly" name="address" id="address" value="{{$user->address}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Birth Date</label>
                        <input type="date" class="form-control" name="birthDate" value="{{$user->birthDate}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mobile Number</label>
                        <input type="tel" pattern="[0-9]{11}" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="number" value="{{$user->number}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="DivTemplate mb-2">
                <p class="DivHeaderText center-align">USER PHOTO</p>
                <div class="hr"></div>
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
                <button type="submit" class="save-button mt-1" style="width:100%;">Save</button>
                <button type="button" class="back-button float-right mt-1" style="width:100%;" onclick="window.location='{{route('users.index')}}'">Back</button>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Address</h5>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Unit/Floor</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="{{$user->unit}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Building Name</label>
                            <input type="text" class="form-control" id="buildingName" name="buildingName" value="{{$user->buildingName}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lot/Blk/House/Bldg. No.</label>
                            <input type="text" class="form-control" id="bldgNumber" name="bldgNumber" value="{{$user->bldgNumber}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Street</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{$user->street}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>District</label>
                            <input type="text" class="form-control" id="district" name="district" value="{{$user->district}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="input-label required-label">City</label>
                            <select name="city" id="city" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">
                                        {{$city}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Province</label>
                            <select name="province" id="province" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province}}">
                                        {{$province}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="generate">Use</button>
            </div>
        </div>
        </div>
    </div>
</form>

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

    // load Dropdown value
    
    $('#province').val('{{$user->province}}').trigger('change');
    $('#city').val('{{$user->city}}').trigger('change');
    

});

$(function (){
    $('#generate').on('click', function(){
        var unit = $('#unit').val() != '' ? $('#unit').val() : '';
        var buildingName = $('#buildingName').val() != '' ? " "+$('#buildingName').val() : '';
        var bldgNumber = $('#bldgNumber').val() != '' ? " "+$('#bldgNumber').val() : '';
        var street = $('#street').val() != '' ? " "+$('#street').val() : '';
        var district = $('#district').val() != '' ? ", "+$('#district').val() : '';
        var province = $('#province option:selected').val() ? ", "+$('#province option:selected').val() : '';
        var city = $('#city option:selected').val() ? ", "+$('#city option:selected').val() : '';
        var str = unit+buildingName+bldgNumber+street+district+city+province;
        $('#address').val(str.replace(/^,/, '').trim()); // remove comma on first index
        // $('#address').val(str.replace(/^ /, '')); // remove comma on space index
        // $('#address').val(str);
        $('#exampleModal').modal('toggle');
    });
    $('#address').on('click focus',function(){
        // $('#exampleModal').modal('toggle');
        $('#exampleModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    });
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
});
</script>
@endsection