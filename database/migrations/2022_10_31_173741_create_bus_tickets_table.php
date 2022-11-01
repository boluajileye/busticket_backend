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
        Schema::create('bus_tickets', function (Blueprint $table) {
            $table->id();
            $table->index('user_id')->unsigned();
            $table->index('busSchedule_id')->unsigned();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('busSchedule_id')->references('id')->on('bus_schedules');
            $table->enum('status', ['unused', 'used']);
            $table->string('price');
            $table->string('reference');
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
        Schema::dropIfExists('bus_tickets');
    }
};
