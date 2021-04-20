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

    .thead-bg{
    color: #fc8621;
    background-color: #ffffff;
    text-align: center;
    }
    table.dataDisplayer td {
        font-weight:bold;
        letter-spacing: 0.5px;
        font-size: 13px;
        color: rgb(30,30,30, 0.9);
        text-align: center;
    }
    .th-border{
        border: 1px solid #ebebeb !important;
        font-weight: 600 !important;
        letter-spacing: 1px !important;
    }
    .td-border{
        border: 1px solid #ebebeb !important;
    }
    tbody.tbody-bg{
        background-color: #ffffff;
        text-align: center;
    }
    .back-button {
    background-color: grey;
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
    .back-button:hover{
        background-color: #616161 !important;
    }   
</style>
<body style="background-image: url('images/home_gallary/4.jpg'); height: 1050px;  background-size: 100% 100%; background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="background: whitesmoke;  margin: 300px 0px; border-radius: 10px">
                <div class="form-row mt-4 px-3">
                    <div class="form-group col-sm-12">
                        <span class="DivHeaderText center-align">SEARCH AVAILABLE ROOM</span>
                        <div style=" border: 1px solid #fc8621 !important; margin-top: 5px"></div>
                    </div>
               </div>
               <div class="table-responsive mt-1 px-3">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                <thead class="thead-bg">
                    <tr>
                        <th class="th-sm th-border">Room Name</th>
                        <th class="th-sm th-border">Room Price</th>
                        <th class="th-sm th-border" width="100px">Capacity</th>
                        <th class="th-sm th-border" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody class="tbody-bg">
                    <tr class="data font-weight-bold">
                        <td class="td-border">Cosmo</td>
                        <td class="td-border">₱400 By 4 Hours</td>
                        <td class="td-border">3</td>
                        <td class="td-border"><button class="save-button">Book</button></td>
                    </tr>
                </tbody>
            </table>
            </div>
                <div class="form-row mx-2 pb-3">
                    <div class="form-group col-sm-12">
                        <button class="save-button float-left" type="submit">Search Again</button>
                        <button class="back-button float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>  
            </div>
            <div class="col-sm" style="margin-top: 350px; margin-left: 57px; color: whitesmoke">
                <h2 class="font-weight-bold" style="letter-spacing: 2px">MAKE YOUR <br>RESERVATION</h2>
                <h3>lorem ipsum dolor</h3>
            </div>
        </div>
    </div>
</body>
@endsection
