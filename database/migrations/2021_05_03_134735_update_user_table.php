<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('unit')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('bldgNumber')->nullable();
            $table->string('street')->nullable();
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
            $table->dropColumn('unit');
            $table->dropColumn('buildingName');
            $table->dropColumn('bldgNumber');
            $table->dropColumn('street');
        });
    }
}
