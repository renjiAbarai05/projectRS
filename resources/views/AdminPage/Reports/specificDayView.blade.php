@extends('AdminPage.Reports.reportMaster')
@section('reportContent')

<div class="DivTemplate mt-3">
    <p class="DivHeaderText mb-n3 pb-1">SPECIFIC DAY VIEW</p>
    <div class="hr mt-3"></div>
   

      <div class="col-sm-12 mt-3" id="specificDayViewRow">
        <form  method='POST' action="{{ route('searchBySpecificDay') }}">
          @csrf
              <ul class="mb-0 float-right">
                <li class="DivLinks-header">
                    <input type="date" class="form-control" name="date_input" value="@if(isset($dateInput)){{$dateInput}}@else @endif">
                </li>
                <li class="DivLinks-header">
                    <button type="submit" class="form-control btn-sm btn-primary">search</button>
                </li>
              </ul>
         </form>
      </div>

    <div id='montlhy' >
        {!! $chart->html() !!}
    </div>

</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}

@endsection