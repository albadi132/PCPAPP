<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutionsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executions_log', function (Blueprint $table) {
            $table->id();
            $table->boolean('execution_result');
            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('test_reference_id');

            $table->foreign('submission_id')->references('id')->on('submissions_log');
            $table->foreign('test_reference_id')->references('id')->on('problem_test_reference');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executions_log');
    }
}
