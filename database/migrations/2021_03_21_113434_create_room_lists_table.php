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
            $table->Integer('isActive')->default(1);
            $table->string('roomType');
            $table->Integer('roomNumber');
            $table->float('price');
            $table->Integer('roomRate');
            $table->Integer('capacity');
            $table->text('details')->nullable();
            $table->Integer('userId');
            $table->softDeletes();
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
