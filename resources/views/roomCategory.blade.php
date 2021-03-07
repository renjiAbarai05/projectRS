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
            <p class="p-0 m-0 header d-inline">ROOM CATERGORY</p>
            <button id="addCategoryButton" style="border:none; background:none; float:right;"><i class="fas fa-plus-circle float-right add-button"></i></button>
        </div>
        <div class="divContainer mt-n2">
            {{-- <p class="data">No Data</p> --}}
            <div class="table-responsive mt-1">
                <table id="TblSorter" class="table table-striped table-bordered table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm ">Room Name</th>
                          <th class="th-sm" width="100px">Price</th>
                          <th class="th-sm text-center" width="200px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    
                           <tr  class="data font-weight-bold">
                              <td>Duplex</td>
                              <td>₱500</td>
                              <td class="text-center">
                                <button class="btn updateColor  btn-sm" style="color:white; width:100%;" onclick="updateModal()"> Update</button>
                                <button class="btn deleteColor  btn-sm" style="color:white; width:100%;" > Delete</button>
                              </td>
                          </tr>
                          <tr  class="data font-weight-bold">
                              <td>Family</td>
                              <td>₱200</td>
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



 {{-- Create Modal --}}
 <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true" style="margin-top: 70px">
 <div class="modal-dialog modal-lg" role="document" >
   <div class="modal-content">
     <div class="modal-header text-center">
       <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px">ADD ROOM CATEGORY</h4>
       {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button> --}}
     </div>
     <div class="modal-body mx-3 mb-3">
        <div class="row mt-1">
             <div class="col-sm-12">
                 <label>Room Type Name::</label>
             <input type="text" class="form-control" >
             </div>
        </div>
        <div class="row mt-1">
             <div class="col-sm-6">
                 <label>Number of Rooms:</label>
                 <input type="number" class="form-control">
             </div>
             <div class="col-sm-6">
                <label>Number of Beds:</label>
                <input type="number" class="form-control">
            </div>
         </div>
        <div class="row mt-1">
            <div class="col-sm-12">
                <label>Bed Type:</label>
                <select class="form-control">
                <option value="" selected>Single</option>
                <option value=""> Double</option>
                </select>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-sm-12">
                <label>Facility:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-sm-12">
                <label>Price Per Night:</label>
                <input type="number" class="form-control">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-sm-12">
                <label>Details:</label>
                <textarea class="form-control"></textarea>
            </div>
        </div>
     </div>
     <div class="row px-4 pb-3">
         <div class="col-sm-12">
             <button class="btn btn-deep-orange float-left">Save</button>
             <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
         </div>
     </div>

   </div>
 </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" style="margin-top: 70px">
<div class="modal-dialog modal-lg" role="document" >
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold" style="letter-spacing: 3px">EDIT ROOM CATEGORY</h4>
      {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    </div>
    <div class="modal-body mx-3 mb-3">
       <div class="row mt-1">
            <div class="col-sm-12">
                <label>Room Type Name::</label>
            <input type="text" class="form-control" >
            </div>
       </div>
       <div class="row mt-1">
            <div class="col-sm-6">
                <label>Number of Rooms:</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-sm-6">
               <label>Number of Beds:</label>
               <input type="number" class="form-control">
           </div>
        </div>
       <div class="row mt-1">
           <div class="col-sm-12">
               <label>Bed Type:</label>
               <select class="form-control">
               <option value="" selected>Single</option>
               <option value=""> Double</option>
               </select>
           </div>
       </div>
       <div class="row mt-1">
           <div class="col-sm-12">
               <label>Facility:</label>
               <input type="text" class="form-control">
           </div>
       </div>
       <div class="row mt-1">
           <div class="col-sm-12">
               <label>Price Per Night:</label>
               <input type="number" class="form-control">
           </div>
       </div>
       <div class="row mt-1">
           <div class="col-sm-12">
               <label>Details:</label>
               <textarea class="form-control"></textarea>
           </div>
       </div>
    </div>
    <div class="row px-4 pb-3">
        <div class="col-sm-12">
            <button class="btn btn-deep-orange float-left">Save</button>
            <button class="btn btn-deep-orange float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
    </div>

  </div>
</div>
</div>







<script>
    $(document).ready(function(){
        
        $('#addCategoryButton').click(function(){
                $('#createCategoryModal').modal('show');
        });
    
        $('#TblSorter').DataTable({
            "columnDefs": [
            { "orderable": false, "targets": 2 }
            ],
            "order": [[ 0, "desc" ]],
        });
    });



    function updateModal(){
        $('#editCategoryModal').modal('show');
    }

    </script>

@endsection