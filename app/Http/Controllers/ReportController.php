<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookingReserve;
use App\BookingPayment;

use Charts;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DateTime;

class ReportController extends Controller
{
   
    
    //Daily View
    public function dailyView(){
        Session::put('masterAdminSide', 'Report');
        Session::put('report', 'dailyView');

        $payments = BookingPayment::all();
        $month = date("m"); 
        $year = date("Y"); 
        
        $dateObj = DateTime::createFromFormat('!m', $month);
        // Store the month name to variable
        $monthName = $dateObj->format('F');

        foreach($payments as $key => $payment) {
            $payment->cashTotal = $payment->cashReceived - $payment->changeAmount;
        }

        $chart = Charts::database($payments, 'bar', 'highcharts')
                ->title("Daily Report for the Month of ".$monthName.' '.$year.'.')
                ->elementLabel("Total Sales")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->aggregateColumn('cashTotal', 'sum')
                ->groupByDay($month, $year, true);

        return view('AdminPage.Reports.dailyView',compact('chart','month','year'));
    }

    public function searchByDailyView(Request $request) {
        $year = $request->year;
        $month = $request->month;

        $dateObj = DateTime::createFromFormat('!m', $month);
        // Store the month name to variable
        $monthName = $dateObj->format('F');

        $payments = BookingPayment::all();

        foreach($payments as $key => $payment) {
            $payment->cashTotal = $payment->cashReceived - $payment->changeAmount;
        }

        $chart = Charts::database($payments, 'bar', 'highcharts')
                ->title("Daily Report for the Month of ".$monthName.' '.$year.'.')
                ->elementLabel("Total Sales")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->aggregateColumn('cashTotal', 'sum')
                ->groupByDay($month, $year, true);

                return view('AdminPage.Reports.dailyView',compact('chart','month','year'));

    }

    //Specific Date Viewing 
    public function specificDayView(){
        Session::put('report', 'specificDayView');

        $todayReport = BookingPayment::whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();
        $dateInput = Carbon::now()->format('Y-m-d');
        $arrReportDate = [];
        $arrReportPayment = [];

        foreach($todayReport as $reports) {
            $arrReportDate[] = $reports->created_at->format('g:i a');
            $arrReportPayment[] = $reports->cashReceived - $reports->changeAmount;
        }
        $chart = Charts::create('bar', 'highcharts')
            ->title(Carbon::now()->format('F j, Y').' '.'Report.')
            ->elementLabel("Total Sales")
            ->labels($arrReportDate)
            ->values($arrReportPayment)
            ->dimensions(1000,500)
            ->responsive(true);
            // return $dateInput;
        return view('AdminPage.Reports.specificDayView',compact('chart','dateInput'));
    }

    public function searchBySpecificDay(Request $request){

            $dateInput = $request->date_input;
            $todayReport = BookingPayment::whereDate('created_at', $dateInput)->get();
            $arrReportDate = [];
            $arrReportPayment = [];

            foreach($todayReport as $reports) {
                $arrReportDate[] = $reports->created_at->format('g:i a');
                $arrReportPayment[] = $reports->cashReceived - $reports->changeAmount;
            }

            $chart = Charts::create('bar', 'highcharts')
                ->title(date('F j, Y', strtotime( $dateInput)).' '.'Report.')
                ->elementLabel("Total Saless")
                ->labels($arrReportDate)
                ->values($arrReportPayment)
                ->dimensions(1000,500)
                ->responsive(true);
                
            return view('AdminPage.Reports.specificDayView',compact('chart','dateInput'));
    }

//Montly View
    public function monthlyView() {
        Session::put('report', 'monthlyView');

        $payments = BookingPayment::all();
        $year2 = date("Y"); 

        foreach($payments as $key => $payment) {
            $payment->cashTotal = $payment->cashReceived - $payment->changeAmount;
        }

        $chart = Charts::database($payments, 'bar', 'highcharts')
                ->title($year2." Monthly Report")
                ->elementLabel("Total Payments")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->aggregateColumn('cashTotal', 'sum')
                ->groupByMonth($year2, true);

        return view('AdminPage.Reports.monthlyView',compact('chart','year2'));

    }

    public function searchByMonthlyView(Request $request) {
        $payments = BookingPayment::all();
        $year2 = $request->year2; 

        foreach($payments as $key => $payment) {
            $payment->cashTotal = $payment->cashReceived - $payment->changeAmount;
        }

        $chart = Charts::database($payments, 'bar', 'highcharts')
                ->title($year2." Monthly Report")
                ->elementLabel("Total Payments")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->aggregateColumn('cashTotal', 'sum')
                ->groupByMonth($year2, true);

        return view('AdminPage.Reports.monthlyView',compact('chart','year2'));

    }

    public function yearlyView() {
        Session::put('report', 'yearlyView');

        $payments = BookingPayment::all();
        foreach($payments as $key => $payment) {
            $payment->cashTotal = $payment->cashReceived - $payment->changeAmount;
        }
        $chart = Charts::database($payments, 'bar', 'highcharts')
                ->title("Yearly Report")
                ->elementLabel("Total Payments")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->aggregateColumn('cashTotal', 'sum')
                ->groupByYear();
        return view('AdminPage.Reports.yearlyView',compact('chart'));

    }
}
