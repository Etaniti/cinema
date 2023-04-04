<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmSessionSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_session_seat', function (Blueprint $table) {
            $table->unsignedBigInteger('film_session_id');
            $table->unsignedBigInteger('seat_id');
            $table->foreign('film_session_id')
                ->references('id')
                ->on('film_sessions')
                ->onDelete('cascade');
            $table->foreign('seat_id')
                ->references('id')
                ->on('seats')
                ->onDelete('cascade');
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
        Schema::dropIfExists('film_session_seat');
    }
}