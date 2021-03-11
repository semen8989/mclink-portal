<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_types', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('expense_type');
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('expense_type_id');
            $table->date('purchase_date');
            $table->double('amount');
            $table->integer('company_id');
            $table->integer('employee_id');
            $table->string('bill_copy')->nullable();
            $table->text('remarks')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('expenses');
    }
}
