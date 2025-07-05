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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donar_name');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['cash', 'check', 'upi', 'bank_transfer']);
            $table->string('check_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('upi_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('donations');
    }
};
