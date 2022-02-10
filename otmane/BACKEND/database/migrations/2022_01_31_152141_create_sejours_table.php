<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
*/
    public function up()
    {
        Schema::create('sejours', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_depart');
            $table->dateTime('date_arrive');
            $table->integer('hotel_id');
            $table->integer('ville_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sejours');
    }
}