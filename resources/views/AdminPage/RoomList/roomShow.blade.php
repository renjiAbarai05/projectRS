@extends('AdminPage.RoomList.roomListMaster')
@section('roomList')


<style>
.print-button {
    background-color: #17a2b8;
    border: none;
    color: white;
    padding: 10px;
    font-size: 16px;
    margin: 2px;
    font-weight: 500;
}
.print-button:hover{
    background-color: #007bff;
}
</style>

                    <div class="DivTemplate " style="width:60%; margin-left:20%;">
                        <div class="DivHeaderText">ROOM DETAILS</div>
                        <div class="hr my-1" style="height:2px;"></div>
                    
                        <table class="table table-bordered mt-2">
                            <tr  class="thead-light DivHeaderText">
                                <th class="th-text" width="150px">Room Name</th>
                                <td>{{$roomListData->roomType}}</td>
                            </tr>
                            <tr  class="thead-light DivHeaderText">
                                <th class="th-text" width="150px">Room Number</th>
                                <td> {{$roomListData->roomNumber}}</td>
                            </tr>
                            <tr class="thead-light DivHeaderText">
                                <th class="th-text" width="150px">Room Price</th>
                                <td >₱{{$roomListData->price}} By {{$roomListData->roomRate}} Hours </td>
                            </tr>
                            <tr  class="thead-light DivHeaderText">
                                <th class="th-text">Room Capacity</th>
                                <td id="balance_total">{{$roomListData->capacity}} </td>
                            </tr>
                            <tr  class="thead-light DivHeaderText">
                                <th class="th-text">Status</th>
                                <td id="balance_total">@if($roomListData->isActive == 1) Active @else Inactive @endif </td>
                            </tr>
                            <tr  class="thead-light DivHeaderText">
                                <th class="th-text">Details</th>
                                <td id="balance_total">{{$roomListData->details}} </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="update-button" style="width:60%; border-radius:3px;" onclick="window.location='{{ route('roomList.edit',$roomListData->id) }}'">Update</button>
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <button type="button" class="delete-button" style="width:60%; border-radius:3px;" data-id="{{$roomListData->id}}" onclick="deleteModal(this)">Delete</button>
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <button type="button" class="back-button" style="width:60%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('roomList.index') }}'">Back</button>
                    </div>
                
                




@endsection