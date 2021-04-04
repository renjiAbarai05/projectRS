<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //roomInfo
            $table->string('roomId');
            $table->string('roomName');
            $table->integer('roomRate');
            $table->integer('roomPrice');
            $table->integer('roomNumber');
            $table->DATETIME('checkinDate');
            $table->DATETIME('checkoutDate');
            //guestInfo
            $table->string('guestFullName');
            $table->string('guestContactNumber');
            $table->string('guestAddress')->nullable();
            $table->integer('numberOfGuest');
            $table->string('guestEmail')->nullable();

            $table->float('billAmount');
            $table->integer('paymentStatus')->default(0);

            $table->integer('isDismiss')->default(0);
            $table->integer('userId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_reserves');
    }
}
