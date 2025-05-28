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
            $table->string('invoice_id');
            $table->integer('subtotal');
            $table->integer('discount')->default(0);
            $table->integer('shipping_charge');
            $table->integer('total');
            $table->integer('customer_id');
            $table->integer('order_status');
            $table->string('admin_note')->nullable();
            $table->string('customer_note')->nullable();
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
