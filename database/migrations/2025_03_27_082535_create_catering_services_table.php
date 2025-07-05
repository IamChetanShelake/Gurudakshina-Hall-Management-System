<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booked_hall_id');
            $table->string('food_item');
            $table->string('price_per_plate');
            $table->string('total_plates');
            $table->string('total_price');
            $table->foreign('booked_hall_id')->references('id')->on('booked_halls')->onDelete('cascade');
            $table->string('status')->default('pending');

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
        Schema::dropIfExists('catering_services');
    }
};
