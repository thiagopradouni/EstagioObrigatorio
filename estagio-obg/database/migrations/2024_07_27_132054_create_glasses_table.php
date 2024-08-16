<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('product_type', ['Solar', 'Receituario']);
            $table->string('fantasy_code');
            $table->string('description');
            $table->integer('quantity');
            $table->decimal('unit_cost', 8, 2);
            $table->string('brand');
            $table->string('line_material');
            $table->string('color');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('glasses');
    }
};
