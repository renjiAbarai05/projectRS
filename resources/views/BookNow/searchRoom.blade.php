@extends('BookNow.bookNowMaster')
@section('content')
<style>
    .save-button {
    background-color: #4cbb17;
    border: none;
    color: white;
    padding: 9px;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-radius: 3px;
    }
    .save-button:hover{
        background-color: #00a86b;
    }
    .delete-button{
    background-color: #b80f0a;
    border: none;
    color: white;
    padding: 9px;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-radius: 3px;
    float: right !important;
}
.delete-button:hover{
    background-color: red;
}
    
    .DivHeaderText{
        font-weight: 500;
        color: #676767;
    }

</style>

    <div class="container" style="width:50%;" >
    <form class="form-horizontal" id="searchForm" method="POST" action="{{route('bookingHome.searchAvailableRoomsHome')}}">
        @csrf
        {{-- <div class="row">
            <div class="col-sm-6" style="margin-top: 50px;"> --}}
                <div style="background: whitesmoke;  border-radius: 10px;" class="mt-5">
                    <div class="form-row px-3 pt-3">
                        <div class="form-group col-sm-12">
                            <span class="DivHeaderText center-align">SEARCH AVAILABLE ROOM</span>
                            <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                        </div>
                    </div>
                        <div class="form-row mt- px-3">
                            <div class="form-group col-sm-6">
                                <label>Check-in date:</label>
                                <input id="datetimepicker3" class="form-control thisDate" type="text" name="checkinDate" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Check-out date:</label>
                                <input id="datetimepicker4" class="form-control thisDate" type="text" name="checkoutDate" autocomplete="off">
                            </div>
                    </div>
                    <div class="form-row px-3">
                            <div class="col-sm-12">
                                <label>Number of guest:</label>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="number" id="guestNumber" class="form-control" name="guestNumber" autocomplete="off" required>
                            </div>
                    </div>
                    <div class="form-row px-3 pb-2">
                        <div class="form-group col-sm-12">
                            <button class="save-button" type="button"  style="width:200px"  onclick="searchEffect()">Search</button>
                            <button class="delete-button" type="button"  style="width:200px"  onclick="window.location='{{ url('/') }}'">Cancel</button>
                        </div>
                            {{-- <a href="/selectAvailRooms">as</a> --}}
                    </div>  
                </div>
            {{-- </div> --}}
    </form>
            {{-- <div class="col-sm" style="margin-top: 150px; margin-left: 57px; color: whitesmoke">
                <h2 class="font-weight-bold" style="letter-spacing: 2px; ">SEARCH AVAILABLE<br>ROOMS</h2> --}}
                {{-- <h3>lorem ipsum dolor</h3> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    </div>

    <script>
        $(document).ready(function(){
            
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
    
            today = mm + '/' + dd + '/' + yyyy;
    
            $('#datetimepicker3').datetimepicker({
                minDate: today, //today is minimum date
                format:'M j,Y g:i A',
            });
    
            $('#datetimepicker4').datetimepicker({
                minDate: today, //today is minimum date
                format:'M j,Y g:i A',
            });
    
            $('#datetimepicker3').change(function(){
                datePicker4($(this).val());
            });
    
            $('#datetimepicker4').change(function(){
               var date1 = new Date($('#datetimepicker3').val()),
                   date2 = new Date($(this).val());
                if(date2 < date1){
                    Swal.fire('Please Select Date or Time Greater Than Check-in.')
                    $(this).val("");
                }
            });
    
    
        });
    
        function datePicker4(thisVal){
            var today = new Date(thisVal);
            $('#datetimepicker4').val("");
            $('#datetimepicker4').datetimepicker({
                minDate: today, //today is minimum date
                format:'M j,Y g:i A',
            });
        }
    
        function searchEffect(){
    
          if($('#datetimepicker3').val() == ""){
                Swal.fire('Check-in date is Required.');
          }else if($('#datetimepicker4').val() == ""){
                Swal.fire('Check-out date is Required.');
          }else if($('#guestNumber').val() == ""){
                Swal.fire('Number of guest is Required.');
          }else{
              $('#searchDiv').hide();
            let timerInterval
            Swal.fire({
                title: 'Searching Available Room...',
                timer: 2000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                $('#searchForm').submit();
            });
          }
            
        }
    </script>

@endsection