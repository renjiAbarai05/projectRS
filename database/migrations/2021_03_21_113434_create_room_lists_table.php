<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('isActive')->default(1);
            $table->integer('deleted')->default(0);;
            $table->string('roomType');
            $table->string('roomNumber');
            $table->float('price');
            $table->text('details');
            $table->text('userId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_lists');
    }
}
