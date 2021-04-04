<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    protected $table = 'booking_payment';

    protected $guarded = ['id'];
}
