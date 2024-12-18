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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('regular_price');
            $table->integer('sale_price')->nullable();
            $table->integer('stock_amount')->default(0);
            $table->integer('hit_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
