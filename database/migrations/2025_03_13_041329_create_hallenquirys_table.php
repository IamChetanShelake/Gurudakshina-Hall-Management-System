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
        Schema::create('hallenquirys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organization')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('email');
            $table->string('contact_no');
            $table->text('address')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('event_type');
            $table->date('event_date');
            $table->enum('duration', ['full_day', 'half_day_morning', 'half_day_evening']);
            $table->integer('expected_audience');
            $table->string('status')->default('pending'); // New field with default value
            $table->string('rent')->nullable();
            $table->text('special_note')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('tea_snacks')->nullable();
            $table->string('lunch_dinner')->nullable();
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
        Schema::dropIfExists('hallenquirys');
    }
};
