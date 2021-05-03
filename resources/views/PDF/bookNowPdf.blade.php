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
    <div class="pb-2">SUMMARY</div>
    <table class="mb-4" style="border-top: 2px solid #c24914">
        <tr>
            <td width="600px">
                <div class="label">Guest Full Name</div>
                <div class="pl-3">
                    {{$bookingData->guestFullName}}
                </div>
            </td>
            <td width="600px">
                <div class="label">Contact Number</div>
                <div class="pl-3">
                    {{$bookingData->guestContactNumber ?? 'N/A'}}
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
        @foreach($roomData as $roomData)
        <tr>
            <td>{{$roomData->roomNumber}}</td>
            <td>{{$roomData->roomName}}</td>
            <td>&#8369;{{$roomData->roomPrice}} By {{$roomData->roomRate}} Hours</td>
        </tr>
        @endforeach
    </table>
    <table class="mb-2 w-100" style="border-top: 2px solid #c24914">
        <tr>
            <td colspan="2">
                <div class="label"><b>Total Bill</b></div>
                <div class="pl-3 font-weight-bold" style="font-size: 20px">
                    &#8369;{{number_format($bookingData->billAmount, 2)}}
                </div>
            </td>
        </tr>
    </table>
    <div style="font-size: 20px">
        You can send your downpayment through:
        <table>
            <tr>
                <td width="300px">
                    GCash<br>Account #: 09234346456<br>Name: Hotel Lai rico.
                </td>
                <td>
                    Paymaya<br>Account #: 09354365636<br>Name: Hotel Lai rico.
                </td>
            </tr>
        </table>
        Please pay immediately to reserve your booking.
    </div>
</body>
</html>