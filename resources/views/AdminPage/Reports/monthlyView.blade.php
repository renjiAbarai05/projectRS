@extends('AdminPage.Reports.reportMaster')
@section('reportContent')

    <div class="DivTemplate mt-3">
        <p class="DivHeaderText mb-n3 pb-1">MONTHLY VIEW</p>
        <div class="hr mt-3"></div>
    

        <div class="col-sm-12 mt-3" id="monthlyViewRow">
            <form  method='POST' action="{{ route('searchByMonthlyView') }}">
            @csrf
                <ul class="mb-0 float-right">
                    <li class="DivLinks-header">
                    <input type="hidden" value="@if(isset($year2)){{$year2}}@else @endif" id="hiddenYear2Val">
                    <select name='year2' class="form-control" id="yearInput2">
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
montlyViewFunction();
});


function montlyViewFunction(){
yearVal2 = $('#hiddenYear2Val').val();
$("#yearInput2 option[value='"+yearVal2+"']").attr("selected", "selected");
}
</script>
@endsection