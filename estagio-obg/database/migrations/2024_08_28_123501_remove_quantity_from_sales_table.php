<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveQuantityFromSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }

    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
        });
    }
}
