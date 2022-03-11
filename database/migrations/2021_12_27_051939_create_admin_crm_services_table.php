<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCrmServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_crm_services', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_crm_id');
            $table->string('service_id');
            $table->integer('quantity');
            $table->integer('uom_id');
            $table->string('tax');
            $table->decimal('price', 20, 2);
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
        Schema::dropIfExists('admin_crm_services');
    }
}