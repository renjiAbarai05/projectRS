<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingReservesRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_reserves_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bookingId');
            $table->integer('customerId')->nullable();
            $table->integer('roomId');
            $table->string('roomName');
            $table->integer('roomNumber');
            $table->integer('roomRate');
            $table->integer('roomPrice');
            $table->integer('isActive')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_reserves_rooms');
    }
}
