<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_unique_id');
            $table->integer('lead_id');
            $table->decimal('total_price', 20, 2);
            $table->integer('quantity');
            $table->string('tax');
            // $table->decimal('final_price', 20, 2);
            $table->decimal('tax_price', 20, 2);
            $table->decimal('final_price_with_tax', 20, 2);
            $table->integer('create_by');
            $table->integer('vendor_id')->nullable();
            $table->integer('vendor_crm_id')->nullable();
            $table->integer('approve')->default(0);
            $table->timestamp('approve_data');
            $table->integer('platform_tax_type')->nullable();
            $table->integer('platform_tax')->nullable();
            $table->decimal('platform_fee', 20, 2)->nullable();
            $table->decimal('final_fee_with_platform', 20, 2)->nullable();
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
        Schema::dropIfExists('quotations');
    }
}