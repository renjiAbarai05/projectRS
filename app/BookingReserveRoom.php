<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingReserveRoom extends Model
{
    protected $table = 'booking_reserves_rooms';

    protected $guarded = ['id'];
}
