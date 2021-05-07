@extends('AdminPage.Users.userMaster')
@section('users')
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
<form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-sm-6">
            <div class="DivTemplate">
                <p class="DivHeaderText center-align">USER DETAILS</p>
                <div class="hr"></div>
                <div class="form-row mb-4 mt-2">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text"class="form-control" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Account Type</label>
                       <select name="accountType" class="form-control" id="" required>
                            <option value="">Select</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                       </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" onkeypress="return /[a-z ]/i.test(event.key)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" onkeypress="return /[a-z ]/i.test(event.key)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middleName" onkeypress="return /[a-z ]/i.test(event.key)">
                    </div>
                   
                    <div class="form-group col-sm-12">
                        <label>Address</label>
                        <input type="text" class="form-control readonly" name="address" id="address">
                        {{-- <textarea name="address" id="address" rows="2" class="form-control readonly"></textarea> --}}
                    </div>
                        <div class="form-group col-sm-12">
                            <label class="input-label">Date of Birth</label>
                            <div class="form-row mb-n3">
                                <div class="form-group col-sm-4">
                                    <select class="form-control" name="month" required>
                                        <option value="" disabled selected>Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select> 
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" name="day" pattern="^\d*(\d{0})?$" type="text" placeholder="Day" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <select class="form-control" type="text" name="year" placeholder="Year" required>
                                    <option value="" disabled selected>Year</option>
                                    <?php
                                    $firstYear = date("Y");
                                    $lastYear = 1900;
                                    for($i=$firstYear;$i>=$lastYear;$i--){
                                    echo '<option value='.$i.'>'.$i.'</option>';}
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="form-group col-md-6">
                        <label>Mobile Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent">+63</span>
                            </div>
                            <input type="tel" pattern="[0-9]{10}" class="form-control" onKeyPress="if(this.value.length==10) return false;return /[0-9]/i.test(event.key)" placeholder="Mobile Number" name="number" autocomplete="off"/>
                        </div>
                        {{-- <input type="tel" pattern="[0-9]{11}" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="number"> --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="input-label mb-2">Gender</label><br>
                        <div class="form-check form-check-inline ml-4">
                            <input type="radio" name="gender" id="genderMale" value="Male" class="form-check-input" checked>
                            <label for="genderMale" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline ml-4">
                            <input type="radio" name="gender" id="genderFemale" value="Female" class="form-check-input">
                            <label for="genderFemale" class="form-check-label">Female</label>
                        </div>
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
                        <div class="p-3">
                            <div class="d-flex justify-content-center">
                                <img id='photoDisplay' class='mx-auto' src='{{ asset('images/defaultpic.jpg') }}' style='border: 3px solid #0996c1; height: 145px; width: 145px; background-size: cover; border-radius: 50%; margin-bottom: 15px'>
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
                            <input type="text" class="form-control" id="unit" name="unit">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Building Name</label>
                            <input type="text" class="form-control" id="buildingName" name="buildingName">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lot/Blk/House/Bldg. No.</label>
                            <input type="text" class="form-control" id="bldgNumber" name="bldgNumber">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Street</label>
                            <input type="text" class="form-control" id="street" name="street">
                        </div>
                        <div class="form-group col-md-6">
                            <label>District</label>
                            <input type="text" class="form-control" id="district" name="district">
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