<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_requests', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->integer('qty');
            $table->string('system');
            $table->integer('cassette_no');
            $table->string('contract_period');
            $table->text('special_requirement');
            $table->string('company_name');
            $table->string('billing_address');
            $table->string('office_contact_no');
            $table->string('installation_address');
            $table->string('person_in_charge');
            $table->string('contact_no');
            $table->string('installation_date');
            $table->string('technician_id');
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
        Schema::dropIfExists('machine_requests');
    }
}
