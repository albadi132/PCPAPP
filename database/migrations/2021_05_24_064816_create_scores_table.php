<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('points');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contest_id');
            $table->unsignedBigInteger('problem_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('submissionlog_id');
            $table->timestamps();


            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('problem_id')->references('id')->on('problems');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('submissionlog_id')->references('id')->on('submissionlogs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
