<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemTestReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_test_reference', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_id');
            $table->longText('problem_input');
            $table->longText('problem_output');

            $table->foreign('problem_id')->references('id')->on('problems_library');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_test_reference');
    }
}
