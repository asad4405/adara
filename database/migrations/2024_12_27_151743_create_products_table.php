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
            $table->string('product_name');
            $table->string('slug');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->integer('old_price')->nullable();
            $table->integer('new_price')->nullable();
            $table->integer('stock');
            $table->string('product_image');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->string('product_unit')->nullable();
            $table->string('product_video')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('hot_product')->nullable();
            $table->integer('new_product')->nullable();
            $table->integer('feature_product')->nullable();
            $table->integer('best_selling')->nullable();
            $table->integer('status');
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
