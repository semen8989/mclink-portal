<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_appraisals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('employee_id')->references('id')->on('users');
            $table->date('review_period_from');
            $table->date('review_period_to');
            $table->date('review_date');
            $table->double('total_score', 3, 2);
            $table->softDeletes();
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
        Schema::dropIfExists('employee_appraisals');
    }
}
