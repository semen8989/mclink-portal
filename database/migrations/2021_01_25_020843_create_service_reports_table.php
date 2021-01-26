<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reports', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('csr_no');
            $table->date('date');
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('address');
            $table->string('call_status')->nullable();
            $table->foreignId('engineer_id');
            $table->foreignId('current_user_id');
            $table->string('engineer_remark')->nullable();
            $table->string('status_after_service')->nullable();
            $table->text('service_rendered');
            $table->dateTime('service_start')->nullable();
            $table->dateTime('service_end')->nullable();
            $table->string('used_it_credit');
            $table->string('signature_image')->nullable();
            $table->date('signed_date')->nullable();
            $table->string('customer_comments')->nullable();
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
        Schema::dropIfExists('service_reports');
    }
}
