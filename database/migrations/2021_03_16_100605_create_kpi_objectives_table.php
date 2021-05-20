<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_objectives', function (Blueprint $table) {
            $table->id();
            $table->mediumText('objective_kpi');
            $table->mediumText('result')->nullable();
            $table->mediumText('feedback')->nullable();
            $table->date('target_date');
            $table->year('objective_year');
            $table->tinyInteger('objective_quarter');
            $table->tinyInteger('status');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('kpi_objectives');
    }
}
