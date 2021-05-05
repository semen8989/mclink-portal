<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeNewAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_new_appraisals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_appraisal_id')->references('id')->on('employee_appraisals');
            $table->tinyInteger('purpose');
            $table->double('pf_score', 2, 2);
            $table->double('qow_score', 2, 2);
            $table->tinyInteger('qow_level');
            $table->mediumText('qow_comment');
            $table->double('wh_score', 2, 2);
            $table->tinyInteger('wh_level');
            $table->mediumText('wh_comment');
            $table->double('jk_score', 2, 2);
            $table->tinyInteger('jk_level');
            $table->mediumText('jk_comment');
            $table->double('bro_score', 2, 2);
            $table->tinyInteger('bro_level');
            $table->mediumText('bro_comment');
            $table->tinyInteger('overall_progress');
            $table->mediumText('progress_comment');
            $table->tinyInteger('recommendation');
            $table->mediumText('final_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_new_appraisals');
    }
}
