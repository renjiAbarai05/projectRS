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
        <div class="container" style="margin-top: 20px">
        <div class="header-banner mt-5">
            <p class="p-0 m-0 header d-inline">CREATE ROOM</p>
        </div>
        <div class="divContainer mt-n2">
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Room Name:</label>
                <input type="text" class="form-control" name="roomType" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Room Number:</label>
                    <input type="number" class="form-control" name="roomNumber" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Room Rate:</label>
                    <select name="" id="" class="form-control">
                        <option value="">Per Day</option>
                        <option value="">Per Hour</option>
                        <option value="">Per Night</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-12">
                    <label>Number of guest:</label>
                    <input type="number" class="form-control" name="price" required>
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
                    <button class="btn btn-deep-orange float-left" type="submit">Save</button>
                    <button class="btn btn-dark float-right" type="button" onclick="window.location='{{ route('roomList.index') }}'">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
{{-- </div> --}}


@endsection