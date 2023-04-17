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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->tinyInteger('status')->default(0);
            $table->decimal('total_price');

            $table->unsignedInteger('cart_number')->nullable();
            $table->string('cart_deadline')->nullable();
            $table->unsignedTinyInteger('cvc_code')->nullable();
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
