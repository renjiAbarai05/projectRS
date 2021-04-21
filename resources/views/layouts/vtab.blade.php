
    <div class="sidebar" id="sidebar">
        <div class="pt-5 mt-3 pb-5">
            <div class="mx-auto mt-2 rounded-circle overflow-hidden" style="width: 130px; height: 130px">
                <img src="{{ asset('images/defaultpic.jpg') }}" style="width: 100%; height: 100%;">
            </div>
            
            <div class="text-center text-uppercase mt-2 font-weight-bold" style="letter-spacing: 1px; color: #ffffff">
                User Name <br>
            </div>

        </div>

    {{-- sessioning  @if (Session::get("vtab") == 'routeName') active @endif --}}
    <a href="/adminPage" class="v-tabs">Calendar</a>
    <a href="{{route('roomList.index')}}" class="v-tabs">Room List</a>
    <a href="{{route('booking.index')}}" class="v-tabs">Bookings</a>
    <a href="{{route('users.index')}}" class="v-tabs">Employee Management</a>
    <a href="{{route('report.index')}}" class="v-tabs">Reports</a>
   
     
    </div>
    
    <script>
        var box = document.getElementById('sidebar');
        new SimpleBar(box);
    </script>
    


