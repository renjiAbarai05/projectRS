@extends('AdminPage.RoomList.roomListMaster')
@section('roomList')

    <div class="DivTemplate">
        <i class="fas fa-plus add-button mr-1"  onclick="window.location='{{ route('roomList.create') }}'"  style="cursor: pointer; float:right; margin-top:1px;"></i>
        <p class="DivHeaderText center-align">ROOM LIST</p>
        <div class="hr"></div>
            <div class="table-responsive mt-3">
                <table id="TblSorter" class="table dataDisplayer table-hover" style="width:100%">
                  <thead class="thead-bg">
                      <tr>
                          <th class="th-sm th-border">Room Number</th>
                          <th class="th-sm th-border" width="300px">Room Name</th>
                          <th class="th-sm th-border">Room Price</th>
                          <th class="th-sm th-border">Capacity</th>
                          <th class="th-sm th-border" width="50px">Status</th>
                          <th class="th-sm th-border" width="100px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($roomListData as $data)
                           <tr class="data font-weight-bold">
                              <td class="td-border">{{$data->roomNumber}}</td>
                              <td class="td-border">{{$data->roomType}}</td>
                              <td class="td-border">₱{{$data->price}} By {{$data->roomRate}} Hours</td>
                              <td class="td-border">{{$data->capacity}}</td>
                              <td class="td-border">@if($data->isActive == 1) Active @else Inactive @endif</td>
                              <td class="td-border">
                                <button class="bg-none" onclick="window.location='{{ route('roomList.edit',$data->id) }}'" title="update"><i class="update-icon fas fa-arrow-alt-circle-up"></i></button>
                                <button class="bg-none" data-id="{{$data->id}}" onclick="deleteModal(this)" title="DELETE"><i class="cancel-icon fas fa-trash"></i></button>
                              </td>
                           </tr>
                        @endforeach
                  </tbody>
              </table>
          </div>
        </div>
</div>

@endsection