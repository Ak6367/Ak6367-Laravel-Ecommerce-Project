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
            $table->string('name',150);
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->double('mrp',20,2)->default('0.00');
            $table->double('price',20,2)->default('0.00');
            $table->text('description');
            $table->string('image',100);
            $table->integer('is_featured');
            $table->integer('is_latest');
            $table->integer('status')->default('1');
            $table->integer('dstatus')->default('0');
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
