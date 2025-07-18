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
        Schema::create('halls_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('sub_title');
            $table->text('description');
            $table->string('image');
            $table->string('capacity');
            $table->string('area');


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
        Schema::dropIfExists('halls_tables');
    }
};
