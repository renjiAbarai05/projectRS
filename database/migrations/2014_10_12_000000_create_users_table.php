<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('middleName')->nullable();
            $table->string('address')->nullable();
            $table->date('birthDate')->nullable();
            // $table->integer('month')->nullable();
            // $table->integer('day')->nullable();
            // $table->integer('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
