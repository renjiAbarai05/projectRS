<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingReserve extends Model
{
    protected $table = 'booking_reserves';

    protected $guarded = ['id'];

    public function room(){
        return $this->hasOne(RoomList::class , 'id');
    }
}
