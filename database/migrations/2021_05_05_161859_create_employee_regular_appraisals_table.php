<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRegularAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_regular_appraisals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_appraisal_id')->references('id')->on('employee_appraisals');
            $table->tinyInteger('jks_score1');
            $table->tinyInteger('jks_score2');
            $table->tinyInteger('jks_score3'); 
            $table->tinyInteger('aos_score1');
            $table->tinyInteger('aos_score2');
            $table->tinyInteger('aos_score3');
            $table->tinyInteger('qow_score1');
            $table->tinyInteger('qow_score2');
            $table->tinyInteger('qow_score3');
            $table->tinyInteger('its_score1');
            $table->tinyInteger('its_score2');
            $table->tinyInteger('its_score3');
            $table->tinyInteger('its_score4');
            $table->tinyInteger('td_score1');
            $table->tinyInteger('td_score2');
            $table->tinyInteger('td_score3');
            $table->tinyInteger('upcp_score1');
            $table->tinyInteger('upcp_score2');
            $table->tinyInteger('upcp_score3');
            $table->mediumText('positive_comment')->nullable();
            $table->mediumText('issue')->nullable();
            $table->mediumText('sr')->nullable();
            $table->mediumText('warning')->nullable();
            $table->mediumText('tf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_regular_appraisals');
    }
}
