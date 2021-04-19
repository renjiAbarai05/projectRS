@extends('AdminPage.Reports.reportMaster')
@section('reportContent')

    <div class="DivTemplate mt-3">
        <p class="DivHeaderText mb-n3 pb-1">DAILY VIEW</p>
        <div class="hr mt-3"></div>
        <div class="col-sm-12 mt-3" id="dailyViewSearchRow">
            <form  method='POST' action="{{ route('searchByDailyView') }}">
            @csrf
                <ul class="mb-0 float-right">
                    <li class="DivLinks-header">
                        <input type="hidden" value="@if(isset($month)){{$month}}@else @endif" id="hiddenMonthVal">
                        <select name='month' class="form-control" id="monthInput">
                            {!! month() !!}
                        </select>
                    </li>
                    <li class="DivLinks-header">
                    <input type="hidden" value="@if(isset($year)){{$year}}@else @endif" id="hiddenYearVal">
                    <select name='year' class="form-control" id="yearInput">
                            <option value="" disabled selected>Year</option>
                            {!! year() !!}
                    </select>
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

<script>

    $(document).ready(function(){
        dailyViewFunction();
    });
    
    
    function dailyViewFunction(){
      var monthVal = $('#hiddenMonthVal').val(),
          yearVal = $('#hiddenYearVal').val();
          $("#monthInput option[value='"+monthVal+"']").attr("selected", "selected");
          $("#yearInput option[value='"+yearVal+"']").attr("selected", "selected");
    }
    </script>
@endsection