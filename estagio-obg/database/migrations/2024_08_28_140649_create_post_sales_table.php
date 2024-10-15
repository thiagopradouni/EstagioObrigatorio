<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSalesTable extends Migration
{
    public function up()
    {
        Schema::create('post_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->date('scheduled_date');
            $table->date('actual_date')->nullable();
            $table->boolean('completed')->default(false);
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_sales');
    }
}

