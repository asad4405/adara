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
        Schema::create('courierier_apis', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('app_key')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('url')->nullable();
            $table->text('token')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courierier_apis');
    }
};
