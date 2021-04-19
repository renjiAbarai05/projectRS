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


            <div class="row">
                <div class="col-sm-6">
                        <div class="DivTemplate">
                            <div class="DivHeaderText">ROOM DETAILS</div>
                            <div class="hr my-1" style="height:2px;"></div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Name</div>
                                    <p class='viewText pl-3'><b>{{$roomListData->roomType}}</b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Number</div>
                                    <p class='viewText pl-3'><b>{{$roomListData->roomNumber}}</b></p>
                                </div>
                            </div>
                            <div class='row' >
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Price</div>
                                    <p class='viewText pl-3'><b>₱{{$roomListData->price}} By {{$roomListData->roomRate}} Hours </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Room Capacity</div>
                                    <p class='viewText pl-3'><b>{{$roomListData->capacity}} </b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Status</div>
                                    <p class='viewText pl-3'><b>@if($roomListData->isActive == 1) Active @else Inactive @endif</b></p>
                                </div>
                                <div class='col-md-6'>
                                    <div class='label text-left'>Details</div>
                                    <p class='viewText pl-3'><b>{{$roomListData->details}}</b></p>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <div class="col-sm-6">
                    <button type="button" class="update-button mt-3" style="width:100%; border-radius:3px;" onclick="window.location='{{ route('roomList.edit',$roomListData->id) }}'">Update</button>
                    <button type="button" class="delete-button mt-1" style="width:100%; border-radius:3px;" data-id="{{$roomListData->id}}" onclick="deleteModal(this)">Delete</button>
                    <button type="button" class="back-button mt-1" style="width:100%; border-radius:3px; background-color: grey;" onclick="window.location='{{ route('roomList.index') }}'">Back</button>
                </div>
            </div>




@endsection