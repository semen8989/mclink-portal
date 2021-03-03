<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiMaingoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_maingoals', function (Blueprint $table) {
            $table->id();
            $table->mediumText('main_kpi');
            $table->mediumText('q1')->nullable();
            $table->mediumText('q2')->nullable();
            $table->mediumText('q3')->nullable();
            $table->mediumText('q4')->nullable();
            $table->mediumText('feedback')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('kpi_maingoals');
    }
}
