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
        Schema::table('hallenquirys', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id')->nullable()->after('event_type');
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('set null');
        });

        Schema::table('accessories', function (Blueprint $table) {
            $table->unsignedBigInteger('enquiry_id')->nullable()->after('hours');
            $table->foreign('enquiry_id')->references('id')->on('hallenquirys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hallenquirys', function (Blueprint $table) {
            $table->dropForeign(['hall_id']);
            $table->dropColumn('hall_id');
        });

        Schema::table('accessoris', function (Blueprint $table) {
            $table->dropForeign(['enquiry_id']);
            $table->dropColumn('enquiry_id');
        });
    }
};
