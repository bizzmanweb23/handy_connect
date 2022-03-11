<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_crms', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('admin_crm_id');
            $table->string('crm_unique_id');
            $table->integer('stage');
            $table->string('delivery_date');
            $table->integer('customer_id');
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
        Schema::dropIfExists('vendor_crms');
    }
}