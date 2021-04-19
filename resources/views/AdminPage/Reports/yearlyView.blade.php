@extends('AdminPage.Reports.reportMaster')
@section('reportContent')

<div class="DivTemplate mt-3">
    <p class="DivHeaderText mb-n3 pb-1">YEARLY VIEW</p>
    <div class="hr mt-3"></div>
   


    <div id='montlhy' >
        {!! $chart->html() !!}
    </div>

    </div>

{!! Charts::scripts() !!}
{!! $chart->script() !!}

@endsection