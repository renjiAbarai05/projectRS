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
.addGenerator{
    position: absolute;
    top: 0;
    right: 0;
    margin-top: 5px;
    margin-right: 2px;
    z-index: 1;
    color: #fc8621;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
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
                    <div class="form-group col-sm-12 position-relative">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="address">
                        <div class="addGenerator" data-toggle="modal" data-target="#exampleModal">
                            <u>Use Address Generator</u>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Birth Date</label>
                        <input type="date" class="form-control" name="birthDate">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact Number</label>
                        <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="number">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
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

    </form>


</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Address Generator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Unit/Floor</label>
                        <input type="text" class="form-control" id="unit">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Building Name</label>
                        <input type="text" class="form-control" id="buildingName">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lot/Blk/House/Bldg. No.</label>
                        <input type="text" class="form-control" id="bldgNumber">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Street</label>
                        <input type="text" class="form-control" id="street">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Region</label>
                        <select id="region" class="form-control"></select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Province</label>
                        <select id="province" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">City</label>
                        <select id="city" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">Barangay</label>
                        <select id="barangay" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label required-label">Zip Code</label>
                        <input type="number" class="form-control" id="zipCode">
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

var my_handlers = {
    fill_provinces:  function(){
        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
        $('#city,#barangay').empty();
    },
    fill_cities: function(){
        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
        $('#barangay').empty();
    },
    fill_barangays: function(){
        var city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
};
$(function(){
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({'location_type': 'regions'});
    $('#province').ph_locations({'location_type': 'provinces'});
    $('#city').ph_locations({'location_type': 'cities'});
    $('#barangay').ph_locations({'location_type': 'barangays'});

    $('#region').ph_locations('fetch_list');

    $('#generate').on('click', function(){
        var unit = $('#unit').val() != '' ? $('#unit').val() : '';
        var buildingName = $('#buildingName').val() != '' ? " "+$('#buildingName').val() : '';
        var bldgNumber = $('#bldgNumber').val() != '' ? " "+$('#bldgNumber').val() : '';
        var street = $('#street').val() != '' ? " "+$('#street').val() : '';
        var region = $('#region option:selected').attr('value') ? ", "+$('#region option:selected').text() : '';
        var province = $('#province option:selected').attr('value') ? ", "+$('#province option:selected').text() : '';
        var city = $('#city option:selected').attr('value') ? ", "+$('#city option:selected').text() : '';
        var barangay = $('#barangay option:selected').attr('value') ? ", "+$('#barangay option:selected').text() : '';
        var zipCode = $('#zipCode').attr('value') ? " "+$('#zipCode').val() : '';
        $('#address').val(unit+buildingName+bldgNumber+street+region+province+city+barangay+zipCode);
        $('#exampleModal').modal('toggle');
    });
});
</script>

@endsection