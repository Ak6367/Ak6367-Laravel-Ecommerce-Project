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
            $table->integer('user_id');
            $table->string('order_no', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile_no', 13)->nullable();
            $table->string('address1', 255)->nullable();
            $table->string('address2', 255)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->integer('pincode');
            $table->double('order_amount', 20, 2)->default('0.00');
            $table->double('shipping_amount', 20, 2)->default('0.00');
            $table->double('total_amount', 20, 2)->default('0.00');
            $table->integer('payment_type');
            $table->integer('shipping_status');
            $table->integer('order_status');
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
