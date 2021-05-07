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
            $table->string('accountType')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('gender')->nullable();
            //birthdate
            $table->string('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('year')->nullable();
            $table->string('picture')->nullable();

            $table->string('isVerified')->default('0');

            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('unit')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('bldgNumber')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            
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
