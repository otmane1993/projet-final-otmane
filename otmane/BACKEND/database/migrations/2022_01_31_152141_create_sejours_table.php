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
            //$table->unsignedBigInteger('hotel_id')->nullable();
            //$table->unsignedBigInteger('ville_id')->nullable();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade')->unsigned();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade')->onUpdate('cascade')->unsigned();
            $table->timestamps();

            
            //$table->foreignId('hotel_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('ville_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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