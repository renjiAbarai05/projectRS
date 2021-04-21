<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookingReserve;
use App\BookingPayment;
use PDF;

class BookingsPrintingController extends Controller
{
    public function bookingsPdf($id)
    {
        $bookingData = BookingReserve::find($id);

        $payments = BookingPayment::where('bookingId',$id)->get();

        $pdf = PDF::loadView('PDF.bookingPdf' ,compact('bookingData','payments'))
        ->setPaper('Letter', 'portrait')
        ->setOption('margin-top','10mm')
        ->setOption('margin-bottom','10mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('bookingInfo.pdf');
        

    }

    public function bookNowPdf($id)
    {
        $bookingData = BookingReserve::find($id);

        $payments = BookingPayment::where('bookingId',$id)->get();

        $pdf = PDF::loadView('PDF.bookNowPdf' ,compact('bookingData','payments'))
        ->setPaper('Letter', 'portrait')
        ->setOption('margin-top','10mm')
        ->setOption('margin-bottom','10mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('bookNowPdf.pdf');
        

    }
}
