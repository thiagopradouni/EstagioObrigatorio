<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('description');
            $table->integer('quantity');
            $table->foreignId('client_id')->constrained();
            $table->decimal('discount', 8, 2);
            $table->string('payment_method');
            $table->decimal('gross_value', 8, 2);
            $table->decimal('net_value', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
