@extends('Homepage.homePageMaster')
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
    
    .DivHeaderText{
        font-weight: 500;
        color: #676767;
    }

</style>
<body style="background-image: url('images/home_gallary/4.jpg');  background-size: 100% 100%; height: 1050px; background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="background: whitesmoke;  margin: 350px 0px; border-radius: 10px">
                <div class="form-row mt-4 px-3">
                    <div class="form-group col-sm-12">
                        <span class="DivHeaderText center-align">BILL DETAILS</span>
                        <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                    </div>
               </div>
               <div class="form-row px-3">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-invoice-dollar"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Cash Received" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
               </div>
               <div class="form-row px-3 mt-1 pb-3">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-check-alt"></i></span>
                    </div>
                    <select class="form-control">
                        <option value="" selected disabled>Payment Method</option>
                        <option value=""> Deluxe Room</option>
                        <option value=""> Classic Room</option>
                        <option value=""> Rooftop Pool</option>
                        <option value=""> Lobby</option>
                    </select>
                </div>
            </div>
            <div class="form-row mx-2 pb-3">
                <div class="form-group col-sm-12">
                    <button class="btn btn-deep-orange float-left">Book Now</button>
                    <button class="btn btn-dark float-right">Cancel</button>
                </div>
            </div>  
            </div>
            <div class="col-sm" style="margin-top: 390px; margin-left: 57px; color: whitesmoke">
                <h2 class="font-weight-bold" style="letter-spacing: 2px">MAKE YOUR <br>RESERVATION</h2>
                <h3>lorem ipsum dolor</h3>
            </div>
        </div>
    </div>
</body>
@endsection