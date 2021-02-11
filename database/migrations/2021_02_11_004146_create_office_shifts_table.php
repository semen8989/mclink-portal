<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_shifts', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('shift_name');
            $table->time('monday_in_time')->nullable();
            $table->time('monday_out_time')->nullable();
            $table->time('tuesday_in_time')->nullable();
            $table->time('tuesday_out_time')->nullable();
            $table->time('wednesday_in_time')->nullable();
            $table->time('wednesday_out_time')->nullable();
            $table->time('thursday_in_time')->nullable();
            $table->time('thursday_out_time')->nullable();
            $table->time('friday_in_time')->nullable();
            $table->time('friday_out_time')->nullable();
            $table->time('saturday_in_time')->nullable();
            $table->time('saturday_out_time')->nullable();
            $table->time('sunday_in_time')->nullable();
            $table->time('sunday_out_time')->nullable();
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
        Schema::dropIfExists('office_shifts');
    }
}
