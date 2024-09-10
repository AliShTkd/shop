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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('sale')->nullable();
            $table->bigInteger('view')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnUpdate()->nullOnDelete();
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
