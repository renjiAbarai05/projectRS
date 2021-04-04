<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->Integer('bookingId');
            $table->float('paymentAmount');
            $table->float('changeAmount')->nullable();
            $table->Integer('userId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_payment');
    }
}
