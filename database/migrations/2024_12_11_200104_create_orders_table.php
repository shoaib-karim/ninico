<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->integer('order_total');
            $table->string('order_status')->default('pending');
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('delivery_address');
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamp')->nullable();
            $table->string('delivery_status')->default('pending');
            $table->string('payment_method');
            $table->integer('payment_amount')->default(value: '0');
            $table->text('payment_date')->nullable();
            $table->text('payment_timestamp')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('BDT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
