@extends('dashboard')
@section('content2')


<style>
    body
		{
          background-color:#ebebeb;
		}
</style>

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('roomList.store')}}">
    @csrf
    <div class="content content-margin pb-2" id="content">
        <div style="padding:1%;">
        <div class="header-banner">
            <p class="p-0 m-0 header d-inline">CREATE ROOM</p>
        </div>
        <div class="divContainer mt-n2">
            <div class="row mt-1">
                <div class="col-sm-6">
                    <label>Room Name:</label>
                    <input type="text" class="form-control" name="roomType" autocomplete="off" required>
                </div>
                <div class="col-sm-6">
                    <label>Room Number:</label>
                    <input type="number" class="form-control" name="roomNumber" autocomplete="off" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-6">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" autocomplete="off" required>
                </div>
                <div class="col-sm-6">
                    <label>Room Rate:</label>
                    <select class="form-control" name="roomRate" required>
                        <option value="" disabled selected>Select</option>
                        <option value="24">By 24 Hours</option>
                        <option value="12">By 12 Hours</option>
                        <option value="3">By 3 Hours</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Capacity:</label>
                    <input type="number" class="form-control" name="capacity" autocomplete="off" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Details:</label>
                    <textarea class="form-control" name="details"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button class="save-button float-left" type="submit">Save</button>
                    <button class="back-button float-right" type="button" onclick="window.location='{{ route('roomList.index') }}'">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
{{-- </div> --}}


@endsection