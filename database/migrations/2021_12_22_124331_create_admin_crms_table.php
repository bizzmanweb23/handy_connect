<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_crms', function (Blueprint $table) {
            $table->id();
            $table->string('crm_unique_id');
            $table->integer('stage');
            $table->string('delivery_date');
            $table->integer('customer_id');
            $table->integer('company_id');
            $table->integer('assign_sales_person')->nullable();
            $table->string('field_visit_employee_id')->nullable();
            $table->integer('field_visit_approve')->default(0);
            $table->string('assign_to_vendor_id')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('admin_crms');
    }
}