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
        Schema::create('booked_halls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_enquiry_id');  // Foreign key
            $table->foreign('hall_enquiry_id')->references('id')->on('hallenquirys')->onDelete('cascade');
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('event_type')->nullable();
            $table->string('hall_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('catering_flag')->default('0');
            $table->string('event_flag')->default('0');







            $table->decimal('total_rent', 10, 2);   // Total rent amount
            $table->decimal('paid_amount', 10, 2)->default(0);  // Amount paid by customer
            $table->decimal('remaining_amount', 10, 2)->default(0); // Remaining amount

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
        Schema::dropIfExists('booked_halls');
    }
};
