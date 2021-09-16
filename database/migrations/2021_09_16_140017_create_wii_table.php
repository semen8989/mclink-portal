<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWiiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wii', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('purpose');
            $table->text('problem');
            $table->text('solution');
            $table->double('incentive_payment')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('category_status')->default(0);
            $table->integer('mark_by')->default(0);
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wii');
    }
}
