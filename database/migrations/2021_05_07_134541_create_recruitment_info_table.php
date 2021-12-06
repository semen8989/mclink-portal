<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_info', function (Blueprint $table) {
            $table->id();
            $table->string('submission_id');
            $table->tinyInteger('status');
            $table->integer('number_of_interview')->nullable();
            $table->integer('interviewer_user_id')->nullable();
            $table->tinyInteger('confirmed')->nullable();
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
        Schema::dropIfExists('recruitment_info');
    }
}
