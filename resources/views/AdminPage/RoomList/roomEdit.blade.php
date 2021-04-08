@extends('AdminPage.RoomList.roomListMaster')
@section('roomList')

{{-- <style>
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
</style> --}}


<form class="form-horizontal" method="POST" action="{{route('roomList.update',$room->id)}}">
    @csrf
    @method('PUT')
    <div class="DivTemplate">
        <p class="DivHeaderText center-align">ROOM EDIT</p>
        <div class="hr"></div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label>Room Name:</label>
                    <input type="text" class="form-control" name="roomType" value="{{$room->roomType}}" required>
                </div>
                <div class="col-sm-6">
                    <label>Room Number:</label>
                    <input type="number" class="form-control" name="roomNumber" value="{{$room->roomNumber}}" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-6">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" value="{{$room->price}}" required>
                </div>
                <div class="col-sm-6">
                    <label>Room Rate:</label>
                    <select class="form-control" id="roomRateSelect" name="roomRate" required>
                        <option value="" disabled selected>Select</option>
                        <option value="24">By 24 Hours</option>
                        <option value="12">By 12 Hours</option>
                        <option value="3">By 3 Hours</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-6">
                    <label>Capacity:</label>
                    <input type="number" class="form-control" name="capacity" value="{{$room->capacity}}" required>
                </div>
                <div class="col-sm-6">
                    <label>Status:</label>
                    <select class="form-control" id="statusSelect" name="isActive" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Details:</label>
                    <textarea class="form-control" name="details">{{$room->details}}</textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="save-button float-left" type="submit">Save</button>
                    <button class="back-button float-right" type="button" onclick="window.location='{{ route('roomList.index') }}'">Cancel</button>
                </div>
            </div>
        </div>
</form>


<script>
    $(document).ready(function(){
        var roomRate = "{{$room->roomRate}}",
            status = "{{$room->isActive}}";

        $("#roomRateSelect option[value='"+roomRate+"']").prop('selected', true);
        $("#statusSelect option[value='"+status+"']").prop('selected', true);
        
    });
</script>


@endsection