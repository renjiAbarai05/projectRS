@extends('dashboard')
@section('content2')


<style>
    body
		{
			/* background-image: url('images/home_bg.jpg'); */
			/* background-repeat: no-repeat;
			background-attachment: fixed; */
            /* margin: 0px !important; */
          background-color:#ebebeb;
		}
        .header-banner{
            background-image: linear-gradient(to right, #fc8621 , #f9e0ae);
            padding: 15px 15px;
            width: 100%;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        .data{
            color: #676767;
            font-size: 15px;
            font-weight: bold;
            padding: 0;
            margin: 0;
            padding-left: 10px;
        }
        .add-button{
            color: #c24914;
            font-size: 28px;
            margin-top: -5px;
        }
</style>



{{-- <div  style="height:100vh;"> --}}
    <div class="container mb-5">
        <div class="header-banner mt-5">
            <p class="p-0 m-0 header d-inline">BOOKINGS</p>
            <button id="bookNowButton" style="border:none; background:none; float:right;"><i class="fas fa-plus-circle float-right add-button"></i></button>
        </div>
        <div class="divContainer mt-n2">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table table-striped table-bordered table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm" width="100px">Date</th>
                          <th class="th-sm" >Room Name</th>
                          <th class="th-sm text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                           <tr  class="data font-weight-bold">
                              <td>Dec 31, 2020</td>
                              <td>Family</td>
                              <td class="text-center">
                                <button class="btn updateColor  btn-sm" style="color:white; width:100%;" onclick="updateModal()"> Update</button>
                                <button class="btn deleteColor  btn-sm" style="color:white; width:100%;" > Delete</button>
                              </td>
                          </tr>
                          <tr  class="data font-weight-bold">
                              <td>January 2, 2021</td>
                              <td>Duplex</td>
                              <td class="text-center">
                                <button class="btn updateColor  btn-sm" style="color:white; width:100%;" onclick="updateModal()"> Update</button>
                                <button class="btn deleteColor  btn-sm" style="color:white; width:100%;" > Delete</button>
                              </td>
                          </tr>
                  </tbody>
              </table>
             
          </div>
        </div>
        
    </div>
{{-- </div> --}}



  {{-- BookNowModal --}}
  <div class="modal fade" id="bookNowCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" style="margin-top: 100px">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px">BOOK NOW</h4>
      </div>
      <div class="modal-body mx-3 mb-3">


          <div class="row">
              <div class="col-sm-6">
                  <label>Check in</label>
                  <input type="date" class="form-control">
               </div>
               <div class="col-sm-6">
                  <label>Check out</label>
                  <input type="date" class="form-control">
               </div>
         </div>
         <div class="row mt-3">
              <div class="col-sm-12">
                  <label>Enter Your Full Name:</label>
              <input type="text" class="form-control" placeholder="Full Name">
              </div>
         </div>
         <div class="row mt-3">
              <div class="col-sm-12">
                  <label>Enter Your Contact Number:</label>
              <input type="number" class="form-control" placeholder="Contact Number">
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-sm-12">
                  <label>Select Room Type:</label>
                  <select class="form-control">
                  <option value="" selected disabled>Select Room Type</option>
                  <option value=""> Deluxe Room</option>
                      <option value=""> Classic Room</option>
                      <option value=""> Rooftop Pool</option>
                      <option value=""> Lobby</option>
                  </select>
              </div>
          </div>
      

      </div>
      <div class="row px-4 pb-3">
          <div class="col-sm-12">
              <button class="btn btn-deep-orange float-left">Book Now</button>
              <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>



{{-- BookNowModal --}}
<div class="modal fade" id="bookNowUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" style="margin-top: 100px">
<div class="modal-dialog modal-lg" role="document" >
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px"> EDIT BOOK NOW</h4>
    </div>
    <div class="modal-body mx-3 mb-3">


        <div class="row">
            <div class="col-sm-6">
                <label>Check in</label>
                <input type="date" class="form-control">
             </div>
             <div class="col-sm-6">
                <label>Check out</label>
                <input type="date" class="form-control">
             </div>
       </div>
       <div class="row mt-3">
            <div class="col-sm-12">
                <label>Enter Your Full Name:</label>
            <input type="text" class="form-control" placeholder="Full Name">
            </div>
       </div>
       <div class="row mt-3">
            <div class="col-sm-12">
                <label>Enter Your Contact Number:</label>
            <input type="number" class="form-control" placeholder="Contact Number">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12">
                <label>Select Room Type:</label>
                <select class="form-control">
                <option value="" selected disabled>Select Room Type</option>
                <option value=""> Deluxe Room</option>
                    <option value=""> Classic Room</option>
                    <option value=""> Rooftop Pool</option>
                    <option value=""> Lobby</option>
                </select>
            </div>
        </div>
    

    </div>
    <div class="row px-4 pb-3">
        <div class="col-sm-12">
            <button class="btn btn-deep-orange float-left">Book Now</button>
            <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
    </div>
  </div>
</div>
</div>







<script>
    $(document).ready(function(){
        
        $('#bookNowButton').click(function(){
                $('#bookNowCreate').modal('show');
        });
    
        $('#TblSorter').DataTable({
            "columnDefs": [
            { "orderable": false, "targets": 2 }
            ],
            "order": [[ 0, "desc" ]],
        });
    });



    function updateModal(){
        $('#bookNowUpdate').modal('show');
    }

    </script>

@endsection