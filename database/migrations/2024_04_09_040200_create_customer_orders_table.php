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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->longText('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('mobile');
            $table->text('shipping');
            $table->text('holding_number');
            $table->longText('order_notes')->nullable();
            $table->longText('total');
            $table->longText('order_number');
            $table->enum('delivery_type',['cash_on_delivery','card'])->default('cash_on_delivery');
            $table->enum('status',['pending','processing','on_the_way','delivery','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};
