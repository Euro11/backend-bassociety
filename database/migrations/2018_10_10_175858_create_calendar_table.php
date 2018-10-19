<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('time');
            $table->integer('match_type')->unsigned();
            $table->integer('home_team')->unsigned();
            $table->foreign('home_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('scoreHome');
            $table->integer('away_team')->unsigned();
            $table->foreign('away_team')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('scoreAway');
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
        Schema::dropIfExists('calendar');
    }
}
