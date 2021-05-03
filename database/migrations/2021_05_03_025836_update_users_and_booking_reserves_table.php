<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersAndBookingReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('province')->nullable();
            $table->string('city')->nullable();
        });
        Schema::table('booking_reserves', function($table) {
            $table->string('province')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('province');
            $table->dropColumn('city');
        });
        Schema::table('booking_reserves', function($table) {
            $table->dropColumn('province');
            $table->dropColumn('city');
        });
    }
}
