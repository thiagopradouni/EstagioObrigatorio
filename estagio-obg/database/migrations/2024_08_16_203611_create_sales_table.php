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
            $table->foreignId('glasses_id')->constrained('glasses')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->enum('payment_method', ['Cash', 'Credit Card', 'Debit Card', 'Bank Transfer']);
            $table->decimal('gross_value', 10, 2);
            $table->decimal('net_value', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
