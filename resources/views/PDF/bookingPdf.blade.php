<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <title>Room Info</title>
    <style>
        body{
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
            color: #676767;
            font-size: 18px;
        }
        .label {
            font-size: 16px;
            font-weight: normal !important;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        td{
            padding: 10px;
        }
        .summaryTable tr td:nth-child(1){
            width: 350px;
            background-color: #e9ecef;
            color: #495057;
        }
        .summaryTable tr td{
            padding: 15px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .paymentTable tr th{
            background-color: #e9ecef;
            color: #495057;
            font-weight: normal;
            padding: 15px;
        }
    </style>
</head>
<body>
    <h3>Hotel Lai Rico</h3>
    <span class="text-uppercase">Guest Details</span>
    <table class="w-100 mb-4" style="border-top: 2px solid #c24914">
        <tr>
            <td>
                <div class="label">Guest Full Name</div>
                <div class="pl-3">
                    {{$bookingData->guestFullName}}
                </div>
            </td>
            <td>
                <div class="label">Contact Number</div>
                <div class="pl-3">
                    @if(strlen($bookingData->guestContactNumber) == 11)
                        @php
                            $newData = substr($bookingData->guestContactNumber, 1);
                        @endphp
                        +63{{$newData}}
                    @else
                        +63{{$bookingData->guestContactNumber}}
                    @endif
                    {{-- {{$bookingData->guestContactNumber ?? 'N/A'}} --}}
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="label">Email</div>
                <div class="pl-3">
                    {{$bookingData->guestEmail ?? 'N/A'}}
                </div>
            </td>
            <td>
                <div class="label">Number of Guest</div>
                <div class="pl-3">
                    {{$bookingData->guestNumber ?? 'N/A'}}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="label">Address</div>
                <div class="pl-3">
                    {{$bookingData->guestAddress ?? 'N/A'}}
                </div>
            </td>
        </tr>
        {{-- <tr>
            <td>
                <div class="label">Province</div>
                <div class="pl-3">
                    {{$bookingData->province ?? 'N/A'}}
                </div>
            </td>
            <td>
                <div class="label">City</div>
                <div class="pl-3">
                    {{$bookingData->city ?? 'N/A'}}
                </div>
            </td>
        </tr> --}}
    </table>
    <span class="text-uppercase">Room Details</span>
    <table class="mb-4" style="border-top: 2px solid #c24914">
        <tr>
            <td width="600px">
                <div class="label">Check-in Date</div>
                <div class="pl-3">
                    {{date_format(\Carbon\Carbon::parse($bookingData->checkinDate),"M j,Y g:i A")}}
                </div>
            </td>
            <td width="600px">
                <div class="label">Check-out Date</div>
                <div class="pl-3">
                    {{date_format(\Carbon\Carbon::parse($bookingData->checkoutDate),"M j,Y g:i A")}}
                </div>
            </td>
        </tr>
    </table>
    <table class="mb-4 table-bordered paymentTable">
        <tr>
            <th class="text-center" width="300px">
                Room #
            </th>
            <th class="text-center" width="300px">
                Room Name
            </th>
            <th class="text-center" width="300px">
                Room Rate
            </th>
        </tr>
        @php
            $totalBill = 0;
            $hours = round((strtotime($bookingData->checkoutDate) - strtotime($bookingData->checkinDate))/3600, 1);
        @endphp
        @foreach($roomData as $roomData)
        <tr>
            <td>{{$roomData->roomNumber}}</td>
            <td>{{$roomData->roomName}}</td>
            <td>&#8369;{{$roomData->roomPrice}} By {{$roomData->roomRate}} Hours</td>
        </tr>
        @php
            $totalBill += ($roomData->roomPrice/$roomData->roomRate) * $hours;
        @endphp
        @endforeach
    </table>
    <span class="text-uppercase">Summary</span>
    <table class="w-100 mb-4 table-bordered summaryTable" style="border-top: 2px solid #c24914">
        <tr>
            <td>
                <div class="label">Status</div>
            </td>
            <td>
                {{$bookingData->paymentStatus == 0 ? 'No Payment' : ($bookingData->paymentStatus == 1 ? 'Partially Paid' : 'Fully Paid')}}
            </td>
        </tr>
        <tr>
            <td>
                <div class="label">Total Bill</div>
            </td>
            <td>
                &#8369;{{number_format($totalBill, 2)}}
            </td>
        </tr>
        <tr>
            <td>
                <div class="label">Total Payment</div>
            </td>
            <td>
                @php
                    $totalPayment = 0;
                    foreach($payments as $payment){
                        $totalPayment = $totalPayment + $payment->cashReceived;
                    }
                @endphp
                &#8369;{{number_format($totalPayment, 2)}}
            </td>
        </tr>
    </table>
    <span class="text-uppercase">Payment Details</span>
    <table class="w-100 mb-4 table-bordered paymentTable" style="border-top: 2px solid #c24914">
        <tr>
            <th class="text-center">
                Date and Time
            </th>
            <th class="text-center">
                Cash Received
            </th>
            <th class="text-center">
                Change
            </th>
            <th class="text-center">
                Payment Method
            </th>
        </tr>
        @foreach ($payments as $payment)
        <tr>
            <td>{{date_format($payment->created_at,"M j,Y g:i A")}}</td>
            <td class="cash_received_value">{{number_format($payment->cashReceived, 2)}}</td>
            <td class="cash_change_value">{{number_format($payment->changeAmount, 2)}}</td>
            <td>{{$payment->paymentMethod}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>