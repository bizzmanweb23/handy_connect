<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_unique_id');
            $table->integer('user_id');
            $table->string('type');
            $table->longText('logo')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('address');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');
            $table->string('website')->nullable();
            $table->string('tag')->nullable();
            $table->string('gst_treatment')->nullable();
            $table->string('gst_no')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('customers');
    }
}