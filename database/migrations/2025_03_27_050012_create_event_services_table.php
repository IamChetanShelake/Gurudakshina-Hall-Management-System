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
        Schema::create('event_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booked_hall_id'); // Add this line
            $table->foreign('booked_hall_id')->references('id')->on('booked_halls')->onDelete('cascade');
            $table->string('service_name')->nullable();
            $table->string('service_price')->nullable();
            $table->string('service_description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_price')->nullable();
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
        Schema::dropIfExists('event_services');
    }
};
