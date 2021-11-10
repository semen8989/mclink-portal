<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_leads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('tel_num');
            $table->string('address')->nullable();
            $table->string('contact_person');
            $table->string('department')->nullable();
            $table->string('mclink_base_reason')->nullable();
            $table->string('mclink_base_model')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('valid_until')->nullable();
            $table->string('existing_brand')->nullable();
            $table->string('non_mclink_base_model')->nullable();
            $table->string('assigned_sales')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('reason')->nullable();
            $table->string('model_closed_and_qty')->nullable();
            $table->integer('amount_payable')->nullable();
            $table->integer('sales_manager');
            $table->integer('approve_by');
            $table->tinyInteger('is_approved')->default(0);
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
        Schema::dropIfExists('sales_leads');
    }
}
