<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomList extends Model
{
    use SoftDeletes;
    protected $table = 'room_lists';

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    
}
