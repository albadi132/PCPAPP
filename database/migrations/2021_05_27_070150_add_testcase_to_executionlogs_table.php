<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestcaseToExecutionlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executionlogs', function (Blueprint $table) {
            $table->unsignedBigInteger('testcase_id')->default(1);

            $table->foreign('testcase_id')->references('id')->on('testcases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('executionlogs', function (Blueprint $table) {
            $table->dropColumn('testcase_id');
        });
    }
}
