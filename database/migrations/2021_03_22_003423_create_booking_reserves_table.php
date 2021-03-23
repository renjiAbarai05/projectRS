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
            $table->date('checkinDate');
            $table->date('checkoutDate');
            $table->integer('roomId');
            $table->string('guestName');
            $table->text('guestContact');
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
